@extends('layouts.mitra')

@section('title', 'Laporan Keuangan')

@section('content')
{{-- Form Filter Tanggal --}}
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Filter Laporan</h3>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('mitra.laporan.index') }}">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tanggal Mulai:</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $startDate->format('Y-m-d') }}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tanggal Selesai:</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $endDate->format('Y-m-d') }}">
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <div class="form-group w-100">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Kartu Statistik --}}
<div class="row mt-4">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Rp {{ number_format($pendapatanKotor, 0, ',', '.') }}</h3>
                <p>Total Pendapatan Kotor</p>
            </div>
            <div class="icon"><i class="fas fa-dollar-sign"></i></div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $jumlahPesanan }}</h3>
                <p>Jumlah Pesanan</p>
            </div>
            <div class="icon"><i class="fas fa-shopping-cart"></i></div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $produkTerjual }}</h3>
                <p>Total Produk Terjual</p>
            </div>
            <div class="icon"><i class="fas fa-box"></i></div>
        </div>
    </div>
</div>

{{-- Tabel Rincian Transaksi --}}
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Rincian Transaksi ({{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }})</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>ID Pesanan</th>
                    <th>Nama Produk</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-end">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksi as $item)
                    <tr>
                        <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                        <td><a href="{{ route('mitra.pesanan.show', $item->order_id) }}">#{{ $item->order_id }}</a></td>
                        <td>{{ $item->product->nama_produk }}</td>
                        <td class="text-center">{{ $item->jumlah }}</td>
                        <td class="text-end">Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada transaksi pada rentang tanggal ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{-- Ini penting agar filter tanggal tetap berfungsi saat pindah halaman --}}
        {{ $transaksi->appends(request()->query())->links() }}
    </div>
</div>
@endsection