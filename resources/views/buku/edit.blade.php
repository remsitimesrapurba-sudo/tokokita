@extends('layout.app')

@section('title', 'Edit Buku')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mb-4">Edit Buku</h2>

            <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')

                <!-- Field Judul -->
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input 
                        type="text" 
                        class="form-control @error('judul') is-invalid @enderror" 
                        id="judul" 
                        name="judul" 
                        value="{{ old('judul', $buku->judul) }}"
                        placeholder="Masukkan judul buku"
                    >
                    @error('judul')
                        <div class="invalid-feedback d-block">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Field Pengarang -->
                <div class="mb-3">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input 
                        type="text" 
                        class="form-control @error('pengarang') is-invalid @enderror" 
                        id="pengarang" 
                        name="pengarang" 
                        value="{{ old('pengarang', $buku->pengarang) }}"
                        placeholder="Masukkan nama pengarang"
                    >
                    @error('pengarang')
                        <div class="invalid-feedback d-block">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Field Tahun Terbit -->
                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input 
                        type="number" 
                        class="form-control @error('tahun_terbit') is-invalid @enderror" 
                        id="tahun_terbit" 
                        name="tahun_terbit" 
                        value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                        placeholder="Contoh: 2026"
                        min="1900"
                        max="{{ date('Y') }}"
                    >
                    @error('tahun_terbit')
                        <div class="invalid-feedback d-block">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sampul_buku" class="form-label">Sampul Buku</label>
                    <input type="file" class="form-control @error('sampul_buku') is-invalid @enderror" id="sampul_buku" name="sampul_buku">
                    <div class="form-text">Format yang diizinkan: JPG, JPEG, PNG. Maksimal 2MB.</div>
                    @error('sampul_buku')
                        <div class="invalid-feedback d-block">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </div>
                    @enderror
                    @if($buku->sampul_buku)
                        <img src="{{ asset('storage/' . $buku->sampul_buku) }}" alt="Sampul Buku" class="img-thumbnail mt-2" style="max-height: 150px;">
                    @endif
                </div>

                <!-- Tombol -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection