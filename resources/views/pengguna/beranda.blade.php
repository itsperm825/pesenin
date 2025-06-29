@extends('layouts.pengguna_app')

@section('title', 'Beranda Pengguna')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Selamat Datang di Pesenin</h5>
                {{-- Ambil hanya nama depan untuk sapaan --}}
                <h1 class="mb-5">Halo, {{ strtok(Auth::user()->name, " ") }}!</h1>
            </div>

            <div class="row g-4 text-center">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="d-block service-item rounded pt-3 h-100 p-4" href="{{ route('pesan') }}">
                        <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                        <h5>Pesan Makanan</h5>
                        <p>Jelajahi beragam menu masakan rumahan dan pesan menu favorit Anda sekarang.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="d-block service-item rounded pt-3 h-100 p-4" href="#">
                        <i class="fa fa-3x fa-receipt text-primary mb-4"></i>
                        <h5>Riwayat Pesanan</h5>
                        <p>Lihat kembali semua pesanan yang pernah Anda lakukan sebelumnya.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="d-block service-item rounded pt-3 h-100 p-4" href="#">
                        <i class="fa fa-3x fa-user-edit text-primary mb-4"></i>
                        <h5>Ubah Profil</h5>
                        <p>Perbarui informasi pribadi, alamat, atau password akun Anda.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection