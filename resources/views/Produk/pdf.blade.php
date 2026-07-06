<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Produk</title>
    <style>
        body { font-family: sans-serif; font-size: 13px; color: #333; }
        h2 { text-align: center; margin-bottom: 5px; }
        .date { text-align: right; font-size: 12px; color: #666; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <h2>LAPORAN INVENTARIS PRODUK<br>TokoKita.com</h2>
    <div class="date">Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}</div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="40%">Nama Produk</th>
                <th width="30%">Harga Satuan</th>
                <th width="25%">Sisa Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_produk as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td class="text-right">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $item->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
