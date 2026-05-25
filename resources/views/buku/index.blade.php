@extends('layout.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Buku Katalog</h2>
        @auth
            <a href="{{ route('buku.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Tambah Buku
            </a>
        @endauth
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
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Tahun Terbit</th>
                        @auth
                            <th>Aksi</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($bukus as $key => $buku)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->pengarang }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            @auth
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
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
