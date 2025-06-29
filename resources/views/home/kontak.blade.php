<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kontak Kami - Pesenin</title>
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
                        <a href="{{ route('pelayanan') }}" class="nav-item nav-link">Pelayanan</a>
                        <a href="{{ route('menu') }}" class="nav-item nav-link">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('kemitraan') }}" class="dropdown-item">Kemitraan</a>
                                <a href="#" class="dropdown-item">Testimoni</a>
                            </div>
                        </div>
                        <a href=" {{ route('kontak')}} " class="nav-item nav-link active">Kontak</a>
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Kontak Kami</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Kontak</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Kontak Kami</h5>
                    <h1 class="mb-5">Hubungi Kami Untuk Pertanyaan Apapun</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Alamat</h5>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Jl. Raya Cileungsi, Jawa Barat</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Email</h5>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>info@pesenin.com</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Telepon</h5>
                                <p><i class="fa fa-phone-alt text-primary me-2"></i>+62 812 3456 7890</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63442.92345212378!2d106.9535178783451!3d-6.39243555554366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699684353a226b%3A0x401576d14fed230!2sCileungsi%2C%20Bogor%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1719515284042!5m2!1sen!2sid"
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('kontak.send') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda" required>
                                            <label for="name">Nama Anda</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Anda" required>
                                            <label for="email">Email Anda</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subjek" required>
                                            <label for="subject">Subjek</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Tinggalkan pesan di sini" id="message" name="message" style="height: 150px" required></textarea>
                                            <label for="message">Pesan</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Kirim Pesan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Ganti bagian ini dengan kode footer Anda atau @include jika sudah dipisah --}}
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