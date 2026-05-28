<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; 
class ProdukController extends Controller
{
    public function index() {
      $data_produk = Produk::all();

    return view('produk.index',compact('data_produk'));
}
    public function create()
{
    return view('produk.create');
}

    public function store(Request $request)
{
    // Produk::create([
    // 'nama_produk' => $request->nama_produk,
    // 'harga' => $request->harga,
    // 'deskripsi' => $request->deskripsi,
    // 'stok' => $request->stok
    // ]);
    // return redirect('/produk');
     // 1. Melakukan Validasi Input Terlebih Dahulu 
         $validatedData = $request->validate([ 
             'nama_produk' => 'required|string|min:3|max:255', 
             'harga'       => 'required|numeric|min:1000', 
             'stok'        => 'required|integer|min:0', 
             'deskripsi'   => 'nullable|string' 
         ], [ 
             // 2. (Opsional) Mengubah pesan error bawaan bahasa Inggris menjadi bahasa Indonesia 
             'nama_produk.required' => 'Kolom nama produk tidak boleh kosong!', 
             'nama_produk.min'      => 'Nama produk minimal harus 3 karakter!', 
             'harga.numeric'        => 'Harga harus berupa angka, tidak boleh huruf!', 
             'harga.min'            => 'Harga produk minimal Rp 1.000!' 
         ]); 
  
         // 3. Jika validasi lolos, simpan ke database menggunakan array hasil validasi 
         // Perhatikan kita menggunakan $validatedData, bukan lagi $request->all() 
         Produk::create($validatedData); 
  
         // 4. Lakukan Redirect sembari membawa "Flash Message" berlabel 'success' 
         return redirect('/produk')->with('success', 'Produk baru berhasil ditambahkan ke dalam katalog!');
}
    // Method untuk menampilkan Form Edit yang sudah terisi data lama 
     public function edit($id)  
     { 
         // Cari data berdasarkan ID. Jika tidak ada, otomatis error 404. 
         $produk = Produk::findOrFail($id);  
          
         // Kirim data $produk tunggal ini ke view edit 
         return view('produk.edit', compact('produk')); 
     } 
  
     // Method untuk menyimpan perubahan data ke database 
     public function update(Request $request, $id)  
     { 
         $produk = Produk::findOrFail($id); 
          
         // Melakukan pembaruan data (Update) 
         $produk->update([ 
             'nama_produk' => $request->nama_produk, 
             'harga' => $request->harga, 
             'deskripsi' => $request->deskripsi, 
             'stok' => $request->stok 
         ]);   
         return redirect('/produk'); 
     } 

     public function destroy($id)  
 { 
       $produk = Produk::findOrFail($id); 
       $produk->delete(); // Menghapus data secara permanen dari database 
       return redirect('/produk'); 
 } 

}