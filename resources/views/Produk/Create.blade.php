@extends('layout.app') 
 @section('title', 'Tambah Produk') 
  
 @section('content') 
 <div class="row mt-4"> 
     <div class="col-md-8 mx-auto"> 
         <div class="card shadow-sm"> 
             <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center"> 
    <h4 class="mb-0">Tambah Produk Baru</h4> 
    <a href="/produk" class="btn btn-light btn-sm fw-bold text-primary">Lihat Daftar Produk</a>
</div>
             <div class="card-body"> 
                 <!-- Action mengarah ke URL proses penyimpanan --> 
                 {{-- <form action="/produk" method="POST"> 
                      
                     @csrf <!-- WAJIB ADA UNTUK KEAMANAN LARAVEL! --> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Nama Produk</label> 
                         <input type="text" name="nama_produk" class="form-control" required> 
                     </div> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Harga (Rp)</label> 
                         <input type="number" name="harga" class="form-control" required> 
                     </div> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Deskripsi</label> 
                         <textarea name="deskripsi" class="form-control" rows="3"></textarea> 
                     </div> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Stok Awal</label> 
                         <!-- Nilai default 0 jika dibiarkan --> 
                         <input type="number" name="stok" value="0" class="form-control"> 
                     </div> 
                      
                     <button type="submit" class="btn btn-success">Simpan Data</button> 
                     <a href="/produk" class="btn btn-secondary">Batal / Kembali</a> 
                 </form>  --}}
                 <form action="/produk" method="POST" enctype="multipart/form-data"> 
     @csrf  
      
     <div class="mb-3"> 
         <label class="form-label">Nama Produk</label> 
         <!-- Tambahkan class is-invalid jika error, dan old() untuk menyimpan ketikan sebelumnya --> 
         <input type="text" name="nama_produk" value="{{ old('nama_produk') }}"  
                class="form-control @error('nama_produk') is-invalid @enderror"> 
          
         <!-- Directive error akan mencetak pesan merah di bawah input --> 
         @error('nama_produk') 
             <div class="invalid-feedback fw-bold"> 
                 {{ $message }} 
             </div> 
         @enderror 
     </div> 
      
     <div class="mb-3"> 
         <label class="form-label">Harga (Rp)</label> 
         <input type="number" name="harga" value="{{ old('harga') }}"  
                class="form-control @error('harga') is-invalid @enderror"> 
         @error('harga') 
             <div class="invalid-feedback fw-bold">{{ $message }}</div> 
         @enderror 
     </div> 
      
     <div class="mb-3"> 
         <label class="form-label">Deskripsi</label> 
         <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea> 
         @error('deskripsi') 
             <div class="invalid-feedback">{{ $message }}</div> 
         @enderror 
     </div> 
      
     <div class="mb-3"> 
         <label class="form-label">Stok Awal</label> 
         <input type="number" name="stok" value="{{ old('stok', 0) }}"  
                class="form-control @error('stok') is-invalid @enderror"> 
         @error('stok') 
             <div class="invalid-feedback">{{ $message }}</div> 
         @enderror 
     </div> 
      
     <div class="mb-3"> 
         <label class="form-label">Upload Foto Produk (Opsional)</label> 
         <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*"> 
         <div class="form-text">Format yang diizinkan: JPG, JPEG, PNG. Ukuran maksimal: 2MB.</div> 
         @error('gambar') 
             <div class="invalid-feedback fw-bold">{{ $message }}</div> 
         @enderror 
     </div> 

     <button type="submit" class="btn btn-success">Simpan Data</button> 
     <a href="/produk" class="btn btn-secondary">Batal / Kembali</a> 
 </form> 
             </div> 
         
     
 
 
</div> 
</div> 
</div> 
@endsection 