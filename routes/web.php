<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\Mahasiswacontroller;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TentangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// pertemuan 2
// A. Route Basic (Route Dasar)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo, Selamat Datang di Laravel 12!';
});

// Route::get('/tentang', function () {
//     return 'Ini adalah halaman Tentang Kami.';
// });


// B. Route dengan Parameter

// URL: http://localhost:8000/mahasiswa/101
Route::get('/mahasiswa/{id}', function ($id) {
    return "Anda sedang melihat data mahasiswa dengan ID: "
        . $id;
});

// URL dengan 2 parameter:
http: //localhost:8000/produk/sepatu/nike
Route::get('/produk/{kategori}/{merk}', function (
    $kategori,
    $merk
) {
    return "Kategori Produk: " . $kategori . " <br> Merk: "
        . $merk;
});

//  C. Optional Route Parameters (Parameter Opsional)

// Jika diakses: http://localhost:8000/salam -> "HaloPengunjung!"
Route::get('/salam/{nama?}', function ($nama = 'Pengunjung') {
    return "Halo " . $nama . "!";
});

// MENGHUBUNGKAN ROUTE KE CONTROLLER
// Format: Route::get('url', [NamaController::class, 'nama_method']);
Route::get('/mahasiswa', [Mahasiswacontroller::class, 'index']);
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']);
Route::get('/data-mahasiswa', [MahasiswaController::class, 'data']);

// ROUTE PRODUKCONTROLLER PER 6
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');

// TUGAS - BUKU RESOURCE ROUTES (CRUD)
// Rute publik - bisa dilihat siapa saja
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');

// Rute terproteksi - hanya untuk authenticated users (Pustakawan)
Route::middleware('auth')->group(function () {
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
});

// Routes tambahan untuk fungsi lama
Route::get('/buku/detail/{id}', [BukuController::class, 'detail']);
Route::get('/buku/kategori{genre}', [BukuController::class, 'kategori']);


//TUGAS3
Route::get('/tentang', [TentangController::class, 'index']);

//pertemuan5 read & update
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);
Route::put('/produk/{id}', [ProdukController::class, 'update']);

// Rute untuk tamu (Guest)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// Rute logout harus menggunakan POST demi keamanan (mencegah CSRF Logout)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
