@extends('layout.app')

@section('title', 'Peminjaman Buku')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Form Peminjaman Buku</h5>
            </div>
            <div class="card-body">
                <form action="/peminjaman" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Buku</label>
                        <select name="buku_id" class="form-select @error('buku_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Buku --</option>
                            @foreach($bukus as $buku)
                                <option value="{{ $buku->id }}" {{ old('buku_id', $bukuId) == $buku->id ? 'selected' : '' }}>
                                    {{ $buku->judul }} — {{ $buku->pengarang }} ({{ $buku->tahun_terbit }})
                                </option>
                            @endforeach
                        </select>
                        @error('buku_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Durasi Peminjaman (Hari)</label>
                        <input type="number" name="durasi" class="form-control @error('durasi') is-invalid @enderror" value="{{ old('durasi', 1) }}" min="1" required>
                        <div class="form-text">Gratis untuk 3 hari pertama. Rp 2.000 per hari tambahan.</div>
                        @error('durasi')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100 fw-bold">Ajukan Peminjaman</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
