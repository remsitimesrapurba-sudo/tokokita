@extends('layout.app') 
 @section('title', 'Edit Produk') 
  
 @section('content') 
 <div class="row mt-4"> 
     <div class="col-md-8 mx-auto"> 
         <div class="card shadow-sm border-warning"> 
             <div class="card-header bg-warning text-dark"> 
                 <h4 class="mb-0">Edit Produk: {{ $produk->nama_produk }}</h4> 
             </div> 
             <div class="card-body"> 
                 <!-- Action mengarah ke rute PUT dengan membawa parameter ID --> 
                 <form action="/produk/{{ $produk->id }}" method="POST"> 
                     @csrf 
                      
                     @method('PUT') <!-- INI ADALAH KUNCI METHOD SPOOFING --> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Nama Produk</label> 
                         <!-- value diisi dengan data dari database --> 
                         <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control" required> 
                     </div> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Harga (Rp)</label> 
                         <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control" required> 
                     </div> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Deskripsi</label> 
                         <!-- Untuk textarea, data diletakkan di antara tag pembuka dan penutup --> 
                         <textarea name="deskripsi" class="form-control" rows="3">{{ $produk->deskripsi }}</textarea> 
                     </div> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Stok Awal</label> 
                         <input type="number" name="stok" value="{{ $produk->stok }}" class="form-control"> 
                     </div> 
                      
                     <button type="submit" class="btn btn-warning text-dark fw-bold">Simpan Perubahan</button> 
                     <a href="/produk" class="btn btn-secondary">Batal</a> 
                 </form> 
             </div> 
         </div> 
     </div> 
 </div> 
 @endsection