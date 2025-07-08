@extends('layouts.pengguna_app') {{-- Gunakan layout pengguna yang sudah kita sempurnakan --}}

@section('title', 'Dasbor Pengguna')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-5 mb-4">Selamat Datang Kembali, <br><span class="text-primary">{{ Auth::user()->name }}</span>!</h1>
                <p class="mb-4">Siap menemukan hidangan lezat hari ini? Jelajahi menu dari berbagai dapur mitra terbaik kami dan nikmati kemudahan memesan makanan favorit Anda langsung dari rumah.</p>
                <a class="btn btn-primary py-3 px-5 mt-2" href="#">Jelajahi Menu</a>
                <a class="btn btn-outline-primary py-3 px-5 mt-2" href="#">Lihat Riwayat Pesanan</a>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                {{-- Anda bisa ganti dengan gambar yang lebih relevan --}}
                <img class="img-fluid" src="{{ asset('img/hero.png') }}">
            </div>
        </div>
    </div>
</div>
@endsection