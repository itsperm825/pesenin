@extends('layouts.pengguna_app')
@section('title', 'Pesanan Berhasil')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Tanda Terima</h5>
            <h1 class="mb-5">Pesanan Anda Berhasil Dibuat!</h1>
        </div>
        <div class="row g-5">
            <div class="col-md-8 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4>Pesanan #{{ $order->id }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Status Saat Ini:</strong> 
                            <span class="badge bg-warning text-dark fs-6">{{ $order->status }}</span>
                        </p>
                        <hr>
                        <h5>Rincian Pesanan:</h5>
                        <ul class="list-group list-group-flush">
                            @foreach($order->orderItems as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->product->nama_produk }}</strong><br>
                                    <small>{{ $item->jumlah }} x Rp {{ number_format($item->harga) }}</small>
                                </div>
                                <span>Rp {{ number_format($item->jumlah * $item->harga) }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h5>Total Pembayaran:</h5>
                            <h5 class="text-primary">Rp {{ number_format($order->total_harga) }}</h5>
                        </div>
                        <hr>
                        <p>Terima kasih telah memesan di Pesenin. Mitra kami akan segera memproses pesanan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection