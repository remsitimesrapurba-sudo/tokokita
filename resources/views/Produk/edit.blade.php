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
                 <form action="/produk/{{ $produk->id }}" method="POST" enctype="multipart/form-data"> 
                     @csrf 
                      
                     @method('PUT') 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Nama Produk</label> 
                         <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" class="form-control @error('nama_produk') is-invalid @enderror" required> 
                         @error('nama_produk') 
                             <div class="invalid-feedback fw-bold">{{ $message }}</div> 
                         @enderror 
                     </div> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Harga (Rp)</label> 
                         <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" class="form-control @error('harga') is-invalid @enderror" required> 
                         @error('harga') 
                             <div class="invalid-feedback fw-bold">{{ $message }}</div> 
                         @enderror 
                     </div> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Deskripsi</label> 
                         <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $produk->deskripsi) }}</textarea> 
                         @error('deskripsi') 
                             <div class="invalid-feedback">{{ $message }}</div> 
                         @enderror 
                     </div> 
                      
                     <div class="mb-3"> 
                         <label class="form-label">Stok Awal</label> 
                         <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}" class="form-control @error('stok') is-invalid @enderror"> 
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
                         @if($produk->gambar) 
                             <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Foto {{ $produk->nama_produk }}" class="img-thumbnail mt-2" style="max-height: 150px;"> 
                         @endif 
                     </div> 
                      
                     <button type="submit" class="btn btn-warning text-dark fw-bold">Simpan Perubahan</button> 
                     <a href="/produk" class="btn btn-secondary">Batal</a> 
                 </form> 
             </div> 
         </div> 
     </div> 
 </div> 
 @endsection