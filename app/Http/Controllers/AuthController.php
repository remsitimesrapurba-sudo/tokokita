<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Facade Auth untuk menangani sesi

class AuthController extends Controller
{
    // 1. Menampilkan Halaman Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }
    // 2. Memproses Data dari Form Login (POST)
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password harus diisi.',
        ]);
        // Auth::attempt() akan mengecek kecocokan email & password ke database
        if (Auth::attempt($credentials)) {
            // Jika berhasil, perbarui ID Session untuk keamanan
            $request->session()->regenerate();
            // Redirect ke halaman yang ingin dituju (atau fallback ke /buku)
            return redirect()->intended('/buku')->with('success', 'Selamat Datang, Anda berhasil login!');
        }
        // Jika GAGAL login, kembalikan ke form dan beri pesan error
        return back()->withErrors([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ])->onlyInput('email'); // onlyInput menjaga agar email yang diketik tidak hilang
    }
    // 3. Memproses Proses Logout
    public function logout(Request $request)
    {
        Auth::logout(); // Hapus sesi Auth
        $request->session()->invalidate(); // Hancurkan semua data session
        $request->session()->regenerateToken(); // Buat ulang CSRF Token
        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}
