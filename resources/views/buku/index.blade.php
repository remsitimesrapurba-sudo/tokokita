@extends('layout.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Buku Katalog</h2>
        <div class="d-flex gap-2">
            @can('isPustakawan')
                <a href="{{ route('buku.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i> Tambah Buku
                </a>
            @endcan
            <a href="{{ url('/buku/cetak-pdf') }}" class="btn btn-outline-danger">
                <i class="fa-solid fa-file-pdf"></i> Export PDF
            </a>
        </div>
    </div>

    @if($bukus->isEmpty())
        <div class="alert alert-info">
            <i class="fa-solid fa-info-circle"></i> Belum ada buku yang terdaftar. 
            @auth
                <a href="{{ route('buku.create') }}">Tambah buku sekarang</a>
            @endauth
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Sampul</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Tahun Terbit</th>
                        @can('isPustakawan')
                            <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($bukus as $key => $buku)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if($buku->sampul_buku)
                                    <img src="{{ asset('storage/' . $buku->sampul_buku) }}" alt="Sampul {{ $buku->judul }}" class="img-thumbnail" style="width: 70px; height: 95px; object-fit: cover;">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->pengarang }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            @can('isPustakawan')
                                <td>
                                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="d-inline" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
