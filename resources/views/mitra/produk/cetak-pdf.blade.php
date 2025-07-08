<!DOCTYPE html>
<html lang="id">
<head>
    <title>Preview Laporan Produk - {{ $mitra->mitra->nama_usaha }}</title>
    {{-- Menggunakan Bootstrap dari CDN untuk styling tombol dan tabel --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'sans-serif';
            padding: 2rem;
        }
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .print-button-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        /* CSS ini akan aktif HANYA saat mencetak */
        @media print {
            .no-print {
                display: none !important; /* Sembunyikan elemen yang tidak perlu dicetak */
            }
            body {
                padding: 0; /* Hapus padding saat mencetak */
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Laporan Daftar Produk</h1>
        <p class="lead">Mitra: {{ $mitra->mitra->nama_usaha }} ({{ $mitra->name }})</p>
        <p>Tanggal Laporan: {{ date('d F Y') }}</p>
    </div>

    {{-- Tombol Aksi (tidak akan ikut tercetak) --}}
    <div class="print-button-container no-print">
        <button onclick="window.print()" class="btn btn-primary">Cetak Sekarang</button>
        <button onclick="window.close()" class="btn btn-secondary">Tutup Preview</button>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th style="width: 10px;">No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produks as $produk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $produk->stok }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>