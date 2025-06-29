<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Layanan Kami - Pesenin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><img src=" {{ asset('img/pesenin-logo.png')}} " alt="Logo"></i>Pesenin</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-2 pe-4">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Beranda</a>
                        <a href="{{ route('tentang-kami') }}" class="nav-item nav-link">Tentang Kami</a>
                        <a href="{{ route('pelayanan') }}" class="nav-item nav-link active">Pelayanan</a>
                        <a href="{{ route('menu') }}" class="nav-item nav-link">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('kemitraan') }}" class="dropdown-item">Kemitraan</a>
                                <a href="#" class="dropdown-item">Testimoni</a>
                            </div>
                        </div>
                        <a href=" {{ route('kontak')}} " class="nav-item nav-link">Kontak</a>
                    </div>
                    <div class="animated-auth-btn-container">
                        <a href="{{ route('login') }}" class="auth-btn login-btn">Masuk</a>
                        <a href="{{ route('register') }}" class="auth-btn register-btn">Daftar</a>
                        <div class="main-text">
                            <i class="fa fa-user-circle me-2"></i>Masuk / Daftar
                        </div>
                    </div>
                </div>
            </nav>
            
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Layanan Kami</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Pelayanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Layanan Unggulan</h5>
                    <h1 class="mb-5">Jelajahi Layanan Kami</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3 h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Pesan Antar Makanan</h5>
                                <p>Layanan utama kami adalah pengantaran masakan rumahan otentik langsung ke depan pintu Anda, panas dan siap santap.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3 h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-calendar-alt text-primary mb-4"></i>
                                <h5>Katering Skala Kecil</h5>
                                <p>Butuh makanan untuk acara arisan, rapat kantor, atau kumpul keluarga? Kami siap melayani pesanan dalam jumlah besar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3 h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-gift text-primary mb-4"></i>
                                <h5>Penawaran & Promo Spesial</h5>
                                <p>Nikmati berbagai diskon, promo gratis ongkir, dan penawaran spesial lainnya secara berkala untuk pelanggan setia kami.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xxl py-5 bg-light">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Alur Pemesanan</h5>
                    <h1 class="mb-5">Hanya 3 Langkah Mudah</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-3 col-md-6 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <div class="p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 100px; height: 100px;">
                                <i class="fa fa-search fa-3x text-white"></i>
                            </div>
                            <h5 class="mb-3">1. Jelajahi Menu</h5>
                            <p class="text-muted">Temukan dan pilih beragam masakan rumahan dari dapur-dapur mitra terbaik kami.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center wow fadeInUp" data-wow-delay="0.3s">
                        <div class="p-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 100px; height: 100px;">
                                <i class="fa fa-shopping-cart fa-3x text-white"></i>
                            </div>
                            <h5 class="mb-3">2. Pesan & Bayar</h5>
                            <p class="text-muted">Masukkan pesanan Anda ke keranjang, lalu lakukan pembayaran dengan metode yang mudah dan aman.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center wow fadeInUp" data-wow-delay="0.5s">
                        <div class="p-4">
                           <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-4" style="width: 100px; height: 100px;">
                                <i class="fa fa-motorcycle fa-3x text-white"></i>
                            </div>
                            <h5 class="mb-3">3. Terima Pesanan</h5>
                            <p class="text-muted">Kurir kami akan segera mengantarkan pesanan Anda dalam kondisi hangat dan terbaik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Perusahaan</h4>
                    <a class="btn btn-link" href="{{ route('tentang-kami') }}">Tentang Kami</a>
                    <a class="btn btn-link" href=" {{ route('kontak')}} ">Kontak Kami</a>
                    <a class="btn btn-link" href="{{ route('kemitraan') }}">Jadi Mitra</a>
                    <a class="btn btn-link" href="#">Kebijakan Privasi</a>
                    <a class="btn btn-link" href="#">Syarat & Ketentuan</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Kontak</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Raya Cileungsi, Jawa Barat</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 812 3456 7890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@pesenin.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Jam Buka</h4>
                    <h5 class="text-light fw-normal">Senin - Sabtu</h5>
                    <p>09:00 - 21:00</p>
                    <h5 class="text-light fw-normal">Minggu</h5>
                    <p>10:00 - 20:00</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Berita</h4>
                    <p>Dapatkan info terbaru dan promo spesial langsung ke email Anda.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Email Anda">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Daftar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Pesenin</a>, All Right Reserved. 
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="{{ url('/') }}">Beranda</a>
                            <a href="#">Cookies</a>
                            <a href="#">Bantuan</a>
                            <a href="#">FAQ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>