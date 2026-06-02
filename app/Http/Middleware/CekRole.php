<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    /**
     * Handle an incoming request.
     * $role adalah parameter dinamis yang akan kita kirim dari Route
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Cek apakah role pengguna SESUAI dengan role yang diizinkan route
        if (Auth::user()->role !== $role) {
            // Jika tidak sesuai, tampilkan halaman Error 403 (Forbidden / Dilarang Akses)
            abort(403, 'Akses Ditolak! Anda tidak memiliki izin untuk membuka halaman ini.');
        }

        // Jika semua syarat terpenuhi, persilakan pengguna melanjutkan ke Controller
        return $next($request);
    }
}
