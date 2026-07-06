@extends('layout.app')

@section('title', 'Peminjaman Saya')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 pt-3">
    <h2 class="fw-bold mb-0">Peminjaman Saya</h2>
    <a href="/peminjaman/create" class="btn btn-primary fw-bold">Pinjam Buku Baru</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Durasi</th>
                    <th>Total Biaya</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjaman as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <strong>{{ $item->buku->judul }}</strong><br>
                            <small class="text-muted">{{ $item->buku->pengarang }} ({{ $item->buku->tahun_terbit }})</small>
                        </td>
                        <td>{{ $item->durasi }} hari</td>
                        <td class="fw-bold text-success">Rp {{ number_format($item->total_biaya, 0, ',', '.') }}</td>
                        <td>
                            @if($item->status == 'Menunggu Konfirmasi Pustakawan')
                                <span class="badge bg-warning text-dark">{{ $item->status }}</span>
                            @elseif($item->status == 'Sedang Dipinjam')
                                <span class="badge bg-info">{{ $item->status }}</span>
                            @else
                                <span class="badge bg-success">{{ $item->status }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada peminjaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
