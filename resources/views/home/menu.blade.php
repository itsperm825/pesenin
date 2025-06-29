<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Menu Kami - Pesenin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
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
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Pesenin</h1>
                    {{-- <img src="img/logo.png" alt="Logo"> --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-2 pe-4">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Beranda</a>
                        <a href="{{ route('tentang-kami') }}" class="nav-item nav-link">Tentang Kami</a>
                        <a href="{{ route('pelayanan') }}" class="nav-item nav-link">Pelayanan</a>
                        <a href="{{ route('menu') }}" class="nav-item nav-link active">Menu</a>
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Menu Makanan</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>
            </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu Makanan</h5>
                    <h1 class="mb-5">Hidangan Paling Populer</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Populer</small>
                                    <h6 class="mt-n1 mb-0">Nasi & Lauk</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <i class="fa fa-leaf fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Segar</small>
                                    <h6 class="mt-n1 mb-0">Sayuran & Sop</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <i class="fa fa-cookie-bite fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Ringan</small>
                                    <h6 class="mt-n1 mb-0">Cemilan</h6>
                                </div>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-4">
                                <i class="fa fa-coffee fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Pelepas Dahaga</small>
                                    <h6 class="mt-n1 mb-0">Minuman</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/nasi-goreng-spesial.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Nasi Goreng Spesial</span>
                                                <span class="text-primary">Rp 28.000</span>
                                            </h5>
                                            <small class="fst-italic">Nasi goreng dengan telur, ayam suwir, bakso, dan acar.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/ayam-bakar.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Ayam Bakar Taliwang</span>
                                                <span class="text-primary">Rp 35.000</span>
                                            </h5>
                                            <small class="fst-italic">Ayam bakar bumbu khas Lombok, disajikan dengan nasi dan plecing kangkung.</small>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/rendang.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Rendang Daging Sapi</span>
                                                <span class="text-primary">Rp 40.000</span>
                                            </h5>
                                            <small class="fst-italic">Potongan daging sapi empuk dengan bumbu rendang kaya rempah.</small>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/ikan-pesmol.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Ikan Nila Pesmol</span>
                                                <span class="text-primary">Rp 32.000</span>
                                            </h5>
                                            <small class="fst-italic">Ikan nila goreng dengan siraman bumbu pesmol kuning yang gurih.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                             <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/sayur-asem.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Sayur Asem Jakarta</span>
                                                <span class="text-primary">Rp 15.000</span>
                                            </h5>
                                            <small class="fst-italic">Sayur asem dengan isian lengkap, kuah segar dan sedikit pedas.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/sop-buntut.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Sop Buntut Spesial</span>
                                                <span class="text-primary">Rp 55.000</span>
                                            </h5>
                                            <small class="fst-italic">Potongan buntut sapi empuk dengan kuah kaldu kaya rempah, wortel, dan kentang.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/mendoan.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Tempe Mendoan</span>
                                                <span class="text-primary">Rp 12.000</span>
                                            </h5>
                                            <small class="fst-italic">Tempe mendoan hangat (isi 5) disajikan dengan sambal kecap pedas.</small>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/bakwan.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Bakwan Sayur Udang</span>
                                                <span class="text-primary">Rp 15.000</span>
                                            </h5>
                                            <small class="fst-italic">Bakwan sayur renyah dengan udang (isi 5), cocok untuk teman makan.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/es-teh.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Es Teh Manis</span>
                                                <span class="text-primary">Rp 8.000</span>
                                            </h5>
                                            <small class="fst-italic">Minuman klasik teh manis dingin yang menyegarkan dahaga.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/menu/es-jeruk.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Es Jeruk Peras</span>
                                                <span class="text-primary">Rp 10.000</span>
                                            </h5>
                                            <small class="fst-italic">Terbuat dari perasan buah jeruk asli yang segar.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Start -->
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
    <!-- Footer End -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>