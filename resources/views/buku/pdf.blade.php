<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Katalog Buku</title>
    <style>
        body { font-family: sans-serif; font-size: 13px; color: #333; }
        h2 { text-align: center; margin-bottom: 5px; }
        .date { text-align: right; font-size: 12px; color: #666; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Katalog Buku</h2>
    <div class="date">Dicetak pada: {{ 
Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $index => $buku)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->pengarang }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
