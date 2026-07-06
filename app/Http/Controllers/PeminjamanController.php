<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::where('user_id', Auth::id())->with('buku')->latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $bukus = Buku::all();
        $bukuId = request('buku_id');
        return view('peminjaman.create', compact('bukus', 'bukuId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'durasi' => 'required|integer|min:1',
        ]);

        if ($request->durasi <= 3) {
            $totalBiaya = 0;
        } else {
            $totalBiaya = ($request->durasi - 3) * 2000;
        }

        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
            'durasi' => $request->durasi,
            'total_biaya' => $totalBiaya,
            'status' => 'Menunggu Konfirmasi Pustakawan',
        ]);

        return redirect('/peminjaman')->with('success', 'Peminjaman berhasil diajukan! Silakan tunggu konfirmasi pustakawan.');
    }

    public function adminIndex()
    {
        $peminjaman = Peminjaman::with('user', 'buku')->latest()->get();
        return view('peminjaman.admin', compact('peminjaman'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu Konfirmasi Pustakawan,Sedang Dipinjam,Sudah Dikembalikan',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui!');
    }
}
