@extends(backpack_view('layouts.top_left'))

@section('content')
    <div class="row">
        {{-- ================================================== --}}
        {{-- TAMPILAN JIKA YANG LOGIN ADALAH ADMIN --}}
        {{-- ================================================== --}}
        @if (backpack_user()->role == 'admin')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dasbor Admin</div>
                    <div class="card-body">Selamat datang, {{ backpack_user()->name }}. Anda memiliki akses penuh ke semua menu manajemen. Gunakan sidebar di sebelah kiri untuk mulai mengelola data.</div>
                </div>
            </div>
        @endif

        {{-- ================================================== --}}
        {{-- TAMPILAN JIKA YANG LOGIN ADALAH MITRA --}}
        {{-- ================================================== --}}
        @if (backpack_user()->role == 'mitra')
            <div class="col-md-12 mb-4">
                 <h1 class="fs-4">Selamat Datang Kembali, {{ backpack_user()->name }}!</h1>
            </div>
            <div class="col-md-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body"><div class="row no-gutters align-items-center"><div class="col mr-2"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pesanan Baru (Hari Ini)</div><div class="h5 mb-0 font-weight-bold text-gray-800">5</div></div><div class="col-auto"><i class="fas fa-shopping-cart fa-2x text-gray-300"></i></div></div></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-success shadow h-100 py-2">
                     <div class="card-body"><div class="row no-gutters align-items-center"><div class="col mr-2"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan (Hari Ini)</div><div class="h5 mb-0 font-weight-bold text-gray-800">Rp 750.000</div></div><div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div></div></div>
                </div>
            </div>
            <div class="col-md-4">
                 <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body"><div class="row no-gutters align-items-center"><div class="col mr-2"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Status Dapur</div><div class="form-check form-switch mt-2"><input class="form-check-input" type="checkbox" role="switch" id="dapurStatus" checked style="transform: scale(1.3);"><label class="form-check-label fw-bold" for="dapurStatus">BUKA</label></div></div><div class="col-auto"><i class="fas fa-store fa-2x text-gray-300"></i></div></div></div>
                </div>
            </div>
        @endif

        {{-- ================================================== --}}
        {{-- TAMPILAN JIKA YANG LOGIN ADALAH PENGGUNA --}}
        {{-- ================================================== --}}
        @if (backpack_user()->role == 'pengguna')
            <div class="col-md-12 mb-4">
                <h1 class="mb-4">Halo, {{ strtok(backpack_user()->name, " ") }}! Mau #PeseninAja hari ini?</h1>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="d-block service-item rounded pt-3 h-100 p-4 text-center text-decoration-none" href="{{ route('pesan') }}">
                    <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                    <h5>Pesan Makanan</h5>
                    <p>Jelajahi beragam menu masakan rumahan dan pesan menu favorit Anda sekarang.</p>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="d-block service-item rounded pt-3 h-100 p-4 text-center text-decoration-none" href="#">
                    <i class="fa fa-3x fa-receipt text-primary mb-4"></i>
                    <h5>Riwayat Pesanan</h5>
                    <p>Lihat kembali semua pesanan yang pernah Anda lakukan sebelumnya.</p>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                 <a class="d-block service-item rounded pt-3 h-100 p-4 text-center text-decoration-none" href="#">
                    <i class="fa fa-3x fa-user-edit text-primary mb-4"></i>
                    <h5>Profil Saya</h5>
                    <p>Perbarui informasi pribadi, alamat, atau password akun Anda.</p>
                </a>
            </div>
        @endif

    </div>
@endsection