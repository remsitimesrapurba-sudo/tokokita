@extends('layout.app')

@section('title', 'Manajemen Peminjaman')

@section('content')
<h2 class="fw-bold mb-4 pt-3">Manajemen Peminjaman</h2>

<div class="card shadow-sm">
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-hover mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Peminjam</th>
                    <th>Buku</th>
                    <th>Durasi</th>
                    <th>Total Biaya</th>
                    <th>Update Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjaman as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <strong>{{ $item->buku->judul }}</strong><br>
                            <small class="text-muted">{{ $item->buku->pengarang }} ({{ $item->buku->tahun_terbit }})</small>
                        </td>
                        <td>{{ $item->durasi }} hari</td>
                        <td class="fw-bold text-success">Rp {{ number_format($item->total_biaya, 0, ',', '.') }}</td>
                        <td style="width: 280px;">
                            <form action="/admin/peminjaman/{{ $item->id }}" method="POST" class="d-flex">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm me-2">
                                    <option value="Menunggu Konfirmasi Pustakawan" {{ $item->status == 'Menunggu Konfirmasi Pustakawan' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                    <option value="Sedang Dipinjam" {{ $item->status == 'Sedang Dipinjam' ? 'selected' : '' }}>Sedang Dipinjam</option>
                                    <option value="Sudah Dikembalikan" {{ $item->status == 'Sudah Dikembalikan' ? 'selected' : '' }}>Sudah Dikembalikan</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada peminjaman di sistem.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
