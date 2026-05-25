<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Menampilkan daftar semua buku
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    // Menampilkan form tambah buku
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan buku baru dengan validasi ketat
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|min:5|string',
            'pengarang' => 'required|regex:/^[a-zA-Z\s]+$/', // Hanya huruf dan spasi
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.min' => 'Judul buku minimal 5 karakter.',
            'pengarang.required' => 'Pengarang wajib diisi.',
            'pengarang.regex' => 'Pengarang hanya boleh berisi huruf (tidak ada angka).',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.min' => 'Tahun terbit minimal tahun 1900.',
            'tahun_terbit.max' => 'Tahun terbit maksimal tahun ' . date('Y') . '.',
        ]);

        // Simpan ke database
        Buku::create($validated);

        // Flash message success
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Menampilkan form edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // Memperbarui buku dengan validasi ketat
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|min:5|string',
            'pengarang' => 'required|regex:/^[a-zA-Z\s]+$/', // Hanya huruf dan spasi
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.min' => 'Judul buku minimal 5 karakter.',
            'pengarang.required' => 'Pengarang wajib diisi.',
            'pengarang.regex' => 'Pengarang hanya boleh berisi huruf (tidak ada angka).',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.min' => 'Tahun terbit minimal tahun 1900.',
            'tahun_terbit.max' => 'Tahun terbit maksimal tahun ' . date('Y') . '.',
        ]);

        // Update data
        $buku->update($validated);

        // Flash message success
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }

    // soalno2 bagian a
    public function detail($id)
    {
        return "Anda sedang melihat detail buku dengan ID : " . $id;
    }

    // soalno3 bagian c
    public function kategori($genre)
    {
        return "Anda sedang melihat detail buku dengan genre :  " . $genre;
    }
}
