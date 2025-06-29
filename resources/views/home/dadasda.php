<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pesenin - Masakan Rumahan Cepat Saji</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Pesenin, Pesan Makanan, Masakan Rumahan, Cileungsi" name="keywords">
    <meta content="Pesenin adalah platform untuk memesan masakan rumahan otentik dari dapur-dapur terbaik di sekitar Anda." name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
</head>

<body>
    {{-- Pembungkus utama konten halaman --}}
    <div class="container-xxl bg-white p-0">

        <!-- Spinner Start -->    
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
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
                        <a href="{{ url('/') }}" class="nav-item nav-link active">Beranda</a>
                        <a href="{{ route('tentang-kami') }}" class="nav-item nav-link">Tentang Kami</a>
                        <a href="#" class="nav-item nav-link">Pelayanan</a>
                        <a href="#" class="nav-item nav-link">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('kemitraan') }}" class="dropdown-item">Kemitraan</a>
                                <a href="#" class="dropdown-item">Tim Kami</a>
                                <a href="#" class="dropdown-item">Testimoni</a>
                            </div>
                        </div>
                        <a href="#" class="nav-item nav-link">Kontak</a>
                    </div>
                    <a href="/login" class="btn btn-primary py-2 px-4">Login / Daftar</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-5 text-white animated slideInLeft">Nikmati Lezatnya Masakan Rumahan Asli<br>Cukup #PeseninAja</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Jelajahi beragam hidangan autentik dari dapur-dapur pilihan di sekitar Anda. Rasa otentik, kualitas terjamin, siap antar ke pintu Anda!</p>
                            <a href="/menu" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Pesan Sekarang</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Pelayanan Start -->
        <div class="container-xxl py-5">
            <div class="container">
                 <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3 h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-check-circle text-primary mb-4"></i>
                                <h5>Kurasi Dapur Terbaik</h5>
                                <p>Kami menyeleksi setiap mitra untuk memastikan kualitas, kebersihan, dan rasa yang konsisten.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3 h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Rasa Asli Rumahan</h5>
                                <p>Menghadirkan kembali kenangan dan kehangatan masakan ibu langsung ke meja makan Anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3 h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Pesan Antar Mudah</h5>
                                <p>Pesan makanan favorit Anda hanya dengan beberapa klik melalui aplikasi atau website kami.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3 h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>Layanan Pelanggan</h5>
                                <p>Tim kami siap membantu Anda jika menemukan kendala atau memiliki pertanyaan seputar pesanan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pelayanan End -->

        <!-- Tentang Kami Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('img/about-1.jpg') }}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('img/about-2.jpg') }}" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('img/about-3.jpg') }}">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('img/about-4.jpg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Cerita Kami</h5>
                        <h1 class="mb-4">Selamat Datang di Pesenin</h1>
                        <p class="mb-4">Pesenin lahir dari sebuah ide sederhana: menghubungkan para pecinta kuliner dengan kelezatan masakan rumahan otentik yang tersembunyi di setiap sudut kota. Kami percaya bahwa setiap dapur rumahan memiliki cerita dan cita rasa unik yang layak untuk dibagikan.</p>
                        <p class="mb-4">Misi kami adalah memberdayakan para pelaku UMKM kuliner, khususnya para ibu rumah tangga dan juru masak lokal di Cileungsi dan sekitarnya, untuk dapat menjangkau lebih banyak pelanggan melalui teknologi yang mudah dan terjangkau.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">100</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Pilihan</p>
                                        <h6 class="text-uppercase mb-0">Dapur Mitra</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">500</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Variasi</p>
                                        <h6 class="text-uppercase mb-0">Menu Rumahan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tentang Kami End -->





        <!-- Kategori Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu Kami</h5>
                    <h1 class="mb-5">Pilihan Kategori Masakan Rumahan</h1>
                </div>
                <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-lg-3 col-sm-6">
                        <a class="cat-item rounded p-4 h-100 d-flex flex-column" href="#">
                            <div class="ratio ratio-4x3 overflow-hidden mb-3">
                                <img class="img-fluid" src="{{ asset('img/kategori/nasi-goreng.jpeg') }}" alt="Nasi Goreng">
                            </div>
                            <div class="mt-auto">
                                <h6 class="text-center text-dark">Nasi Goreng Spesial</h6>
                                <small class="text-center d-block">Berbagai pilihan nasi goreng rumahan</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a class="cat-item rounded p-4 h-100 d-flex flex-column" href="#">
                            <div class="ratio ratio-4x3 overflow-hidden mb-3">
                                <img class="img-fluid" src="{{ asset('img/kategori/sayur-sop.jpeg') }}" alt="Sayur Sop">
                            </div>
                            <div class="mt-auto">
                                <h6 class="text-center text-dark">Aneka Sayur Sop</h6>
                                <small class="text-center d-block">Sop ayam, sop iga, dan lainnya</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a class="cat-item rounded p-4 h-100 d-flex flex-column" href="#">
                            <div class="ratio ratio-4x3 overflow-hidden mb-3">
                                <img class="img-fluid" src="{{ asset('img/kategori/ayam-geprek.jpeg') }}" alt="Ayam Geprek">
                            </div>
                            <div class="mt-auto">
                                <h6 class="text-center text-dark">Ayam Geprek & Sambal</h6>
                                <small class="text-center d-block">Pedasnya bikin nagih!</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a class="cat-item rounded p-4 h-100 d-flex flex-column" href="#">
                            <div class="ratio ratio-4x3 overflow-hidden mb-3">
                                <img class="img-fluid" src="{{ asset('img/kategori/ikan-bakar.jpeg') }}" alt="Ikan Bakar">
                            </div>
                            <div class="mt-auto">
                                <h6 class="text-center text-dark">Olahan Ikan Bakar</h6>
                                <small class="text-center d-block">Ikan segar, bumbu meresap</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a class="cat-item rounded p-4 h-100 d-flex flex-column" href="#">
                            <div class="ratio ratio-4x3 overflow-hidden mb-3">
                                <img class="img-fluid" src="{{ asset('img/kategori/soto-ayam.jpeg') }}" alt="Aneka Soto">
                            </div>
                            <div class="mt-auto">
                                <h6 class="text-center text-dark">Berbagai Macam Soto</h6>
                                <small class="text-center d-block">Soto ayam, soto betawi, dll.</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a class="cat-item rounded p-4 h-100 d-flex flex-column" href="#">
                            <div class="ratio ratio-4x3 overflow-hidden mb-3">
                                <img class="img-fluid" src="{{ asset('img/kategori/tempe-mendoan.jpeg') }}" alt="Cemilan Gorengan">
                            </div>
                            <div class="mt-auto">
                                <h6 class="text-center text-dark">Cemilan & Gorengan</h6>
                                <small class="text-center d-block">Tempe mendoan, bakwan, dan lainnya</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a class="cat-item rounded p-4 h-100 d-flex flex-column" href="#">
                            <div class="ratio ratio-4x3 overflow-hidden mb-3">
                                <img class="img-fluid" src="{{ asset('img/kategori/es-teh.jpeg') }}" alt="Minuman Segar">
                            </div>
                            <div class="mt-auto">
                                <h6 class="text-center text-dark">Minuman Segar Rumahan</h6>
                                <small class="text-center d-block">Es teh, es jeruk, dan lainnya</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a class="cat-item rounded p-4 h-100 d-flex flex-column" href="#">
                            <div class="ratio ratio-4x3 overflow-hidden mb-3">
                                <img class="img-fluid" src="{{ asset('img/kategori/lalapan.jpeg') }}" alt="Sambal dan Lalapan">
                            </div>
                            <div class="mt-auto">
                                <h6 class="text-center text-dark">Aneka Sambal & Lalapan</h6>
                                <small class="text-center d-block">Pelengkap makan yang tak terlupakan</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kategori Menu End -->


        <!-- FAQ Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">FAQ</h5>
                    <h1 class="mb-5">Ingin Tahu Lebih Banyak?</h1>
                </div>
                <div class="faq-container wow fadeInUp" data-wow-delay="0.2s">
                    <div class="faq-questions">
                        <a href="#" class="faq-question active" data-target="faq-1">Bagaimana cara kerja Pesenin?</a>
                        <a href="#" class="faq-question" data-target="faq-2">Metode pembayaran apa saja yang diterima?</a>
                        <a href="#" class="faq-question" data-target="faq-3">Bisakah saya melacak pesanan saya?</a>
                        <a href="#" class="faq-question" data-target="faq-4">Apakah ada diskon atau promosi?</a>
                        <a href="#" class="faq-question" data-target="faq-5">Apakah Pesenin tersedia di area saya?</a>
                    </div>
                    <div class="faq-answers">
                        <div id="faq-1" class="faq-answer active">
                            <div class="faq-answer-content">
                                <div class="process-step">
                                    <img src="{{ asset('img/order-food.png') }}" alt="Place an Order">
                                    <h5>Pesan Sekarang!</h5>
                                    <p>Pesan hidangan melalui website atau aplikasi seluler.</p>
                                </div>
                                <div class="process-step">
                                    <img src="{{ asset('img/food.png') }}" alt="Track Progress">
                                    <h5>Lacak Pesanan</h5>
                                    <p>Lacak status pesanan Anda dengan perkiraan waktu pengiriman.</p>
                                </div>
                                <div class="process-step">
                                    <img src="{{ asset('img/order.png') }}" alt="Get Your Order">
                                    <h5>Terima Pesanan</h5>
                                    <p>Nikmati hidangan Anda yang diantar cepat sampai tujuan!</p>
                                </div>
                            </div>
                            <p class="process-description">
                                Pesenin menyederhanakan proses pemesanan makanan rumahan. Jelajahi beragam menu, pilih hidangan favorit Anda, dan lanjutkan ke pembayaran. Makanan lezat Anda akan segera sampai di pintu Anda!
                            </p>
                        </div>
                        <div id="faq-2" class="faq-answer">
                            <h5>Metode Pembayaran</h5>
                            <p>Kami menerima berbagai metode pembayaran, termasuk transfer bank dan e-wallet populer seperti GoPay, OVO, dan Dana untuk kemudahan Anda.</p>
                        </div>
                        <div id="faq-3" class="faq-answer">
                            <h5>Pelacakan Real-Time</h5>
                            <p>Tentu saja! Setelah pesanan Anda dikonfirmasi, Anda akan menerima link pelacakan untuk memantau posisi kurir dan perkiraan waktu tiba pesanan Anda secara real-time.</p>
                        </div>
                        <div id="faq-4" class="faq-answer">
                            <h5>Diskon dan Promosi</h5>
                            <p>Kami sering mengadakan promosi spesial! Pantau terus halaman promosi di aplikasi atau website kami dan berlangganan buletin kami untuk mendapatkan informasi diskon terbaru.</p>
                        </div>
                        <div id="faq-5" class="faq-answer">
                            <h5>Jangkauan Area</h5>
                            <p>Saat ini kami beroperasi di Cileungsi dan sekitarnya. Untuk memeriksa apakah area Anda termasuk dalam jangkauan layanan kami, silakan masukkan alamat Anda di halaman utama.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ End -->


        <!-- Testimoni Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimoni</h5>
                    <h1 class="mb-5">Apa Kata Mereka Tentang Pesenin</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-transparent border rounded p-4 d-flex flex-column">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="flex-grow-1">"Suka banget sama Pesenin! Rasanya otentik masakan rumahan, jadi berasa makan masakan ibu di rumah. Nggak perlu repot masak lagi kalau lagi sibuk."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Rina Amelia</h5>
                                <small>Karyawan Swasta</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4 d-flex flex-column">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="flex-grow-1">"Pengirimannya cepat dan packingnya rapi banget. Makanan sampai masih hangat. Ayam geprek sambal matahnya juara, pedasnya pas dan bikin nagih!"</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Budi Santoso</h5>
                                <small>Mahasiswa</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4 d-flex flex-column">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="flex-grow-1">"Sebagai ibu rumah tangga, Pesenin ini penyelamat. Kalau lagi nggak sempet masak, tinggal pesan. Menunya variatif, jadi anak-anak nggak bosen."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Dewi Lestari</h5>
                                <small>Ibu Rumah Tangga</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4 d-flex flex-column">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="flex-grow-1">"Harganya sangat terjangkau untuk porsi yang pas dan rasa yang enak. Jauh lebih hemat daripada makan di luar. Cocok buat anak kos."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Agus Wijaya</h5>
                                <small>Pengusaha</small>
                            </div>
                        </div>
                    </div>
                     <div class="testimonial-item bg-transparent border rounded p-4 d-flex flex-column">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="flex-grow-1">"Sering ada promo dan diskon, jadi makin hemat. Layanan pelanggannya juga ramah dan responsif saat ada pertanyaan."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Fajar Nugroho</h5>
                                <small>Driver Ojek</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimoni End -->
         <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Perusahaan</h4>
                    <a class="btn btn-link" href="{{ route('tentang-kami') }}">Tentang Kami</a>
                    <a class="btn btn-link" href="#">Kontak Kami</a>
                    <a class="btn btn-link" href="{{ route('kemitraan.daftar') }}">Jadi Mitra</a>
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
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>