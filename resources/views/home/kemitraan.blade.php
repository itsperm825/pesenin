<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kemitraan - Pesenin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <link href="img/favicon.ico" rel="icon">
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
                        <a href="{{ route('pelayanan') }}" class="nav-item nav-link">Pelayanan</a>
                        <a href="{{ route('menu') }}" class="nav-item nav-link">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('kemitraan') }}" class="dropdown-item active">Kemitraan</a>
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Jadi Mitra Pesenin</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Kemitraan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Keuntungan Bergabung</h5>
                    <h1 class="mb-5">Kembangkan Usaha Kuliner Anda Bersama Kami</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-users text-primary mb-4"></i>
                                <h5>Jangkauan Pelanggan Luas</h5>
                                <p>Dapur Anda akan dilihat oleh ribuan pengguna Pesenin di sekitar Anda. Peluang pesanan meningkat drastis!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-wallet text-primary mb-4"></i>
                                <h5>Tanpa Biaya Pendaftaran</h5>
                                <p>Bergabung menjadi mitra Pesenin gratis! Tidak ada biaya tersembunyi untuk memulai usaha digital Anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                                <h5>Dukungan Pemasaran</h5>
                                <p>Kami bantu promosikan dapur Anda melalui aplikasi dan media sosial kami untuk meningkatkan visibilitas.</p>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cogs text-primary mb-4"></i>
                                <h5>Sistem Pesanan Mudah</h5>
                                <p>Fokus saja pada kualitas masakan. Sistem pesanan, pembayaran, dan laporan kami kelola untuk Anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-shipping-fast text-primary mb-4"></i>
                                <h5>Pengiriman Andal</h5>
                                <p>Tidak perlu pusing memikirkan kurir. Tim pengiriman kami siap mengantar setiap pesanan ke pelanggan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                                <h5>Komunitas & Dukungan</h5>
                                <p>Anda akan menjadi bagian dari komunitas mitra Pesenin. Dapatkan tips dan dukungan untuk terus berkembang.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-dark text-light py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-4 text-white mb-4 animated slideInDown">Siap Menjadi Bagian dari Pesenin?</h1>
                <p class="text-white mb-5 animated slideInDown">Daftarkan dapur rumahan Anda sekarang dan mulailah menjangkau lebih banyak pelanggan. Prosesnya mudah dan cepat!</p>
                <a href=" {{route ('daftar-kemitraan')}} " class="btn btn-primary py-3 px-5 animated slideInDown">Daftar Menjadi Mitra Sekarang</a>
            </div>
        </div>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Reservation</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>