@extends('layouts.mitra_app')

@section('title', 'Dasbor')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fs-4">Selamat Datang Kembali, {{ Auth::user()->name }}!</h1>
        <div class="d-flex align-items-center">
            <i class="fas fa-calendar-alt me-2 text-muted"></i>
            <span class="text-muted">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pesanan Baru (Hari Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $newOrdersCount ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pendapatan (Hari Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($todaysRevenue ?? 0, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Produk Aktif
                            </div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalProducts ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Status Dapur</div>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" role="switch" id="dapurStatus" checked style="transform: scale(1.3);">
                                <label class="form-check-label fw-bold" for="dapurStatus">BUKA</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-store fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 mb-4">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Pendapatan (7 Hari Terakhir)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 mb-4">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pesanan Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Pesanan #PESEN123</h6>
                                <small>3 menit lalu</small>
                            </div>
                            <p class="mb-1">Ayam Bakar (2), Es Teh (2)</p>
                            <small class="text-success">Status: Diterima</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                             <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Pesanan #PESEN124</h6>
                                <small>15 menit lalu</small>
                            </div>
                            <p class="mb-1">Nasi Goreng Spesial (1)</p>
                            <small class="text-warning">Status: Menunggu Konfirmasi</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action text-center text-primary">
                            Lihat Semua Pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('scripts')
{{-- Script untuk Chart.js tetap sama --}}
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: [520000, 600000, 750000, 690000, 820000, 950000, 750000],
                backgroundColor: 'rgba(254, 161, 22, 0.05)',
                borderColor: 'rgba(254, 161, 22, 1)',
                borderWidth: 2,
                tension: 0.3,
                pointBackgroundColor: 'rgba(254, 161, 22, 1)'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false
                }
            },
            maintainAspectRatio: false
        }
    });
</script>
@endsection