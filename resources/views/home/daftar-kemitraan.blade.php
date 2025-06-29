<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daftar Mitra - Pesenin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown active">Lainnya</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('kemitraan') }}" class="dropdown-item active">Kemitraan</a>
                                <a href="#" class="dropdown-item">Tim Kami</a>
                                <a href="#" class="dropdown-item">Testimoni</a>
                            </div>
                        </div>
                        <a href=" {{ route('kontak')}} " class="nav-item nav-link">Kontak</a>
                    </div>
                    <div class="animated-auth-btn-container">
                        <a href="{{ route('login') }}" class="auth-btn login-btn">Login</a>
                        <a href="{{ route('register') }}" class="auth-btn register-btn">Daftar</a>
                        <div class="main-text">
                            <i class="fa fa-user-circle me-2"></i>Masuk / Daftar
                        </div>
                    </div>
                </div>
            </nav>
            
             <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Formulir Pendaftaran Mitra</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/kemitraan') }}">Kemitraan</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Formulir Pendaftaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Langkah Awal</h5>
                    <h1 class="mb-5">Isi Data Dapur Anda</h1>
                </div>
                <div class="row g-5">
                    <div class="col-md-10 mx-auto">
                        {{-- CATATAN: Action form ini mengarah ke route 'kemitraan.store' yang harus Anda buat di backend (Laravel) --}}
                        <form action="{{ route('kemitraan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-4">1. Informasi Pemilik</h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Nama Lengkap Anda" required maxlength="100" data-counter-id="nama_pemilik_count">
                                        <label for="nama_pemilik">Nama Lengkap Pemilik</label>
                                    </div>
                                    <div class="form-text text-end"><span id="nama_pemilik_count">0</span> / 100</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="08123456789" required maxlength="15" data-counter-id="telepon_count">
                                        <label for="telepon">No. Telepon (WhatsApp Aktif)</label>
                                    </div>
                                    <div class="form-text text-end"><span id="telepon_count">0</span> / 15</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="email@anda.com" required maxlength="100" data-counter-id="email_count">
                                        <label for="email">Alamat Email</label>
                                    </div>
                                    <div class="form-text text-end"><span id="email_count">0</span> / 100</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Buat Password" required maxlength="50" data-counter-id="password_count">
                                            <label for="password">Buat Password</label>
                                        </div>
                                        <i class="fa fa-eye-slash toggle-password-icon" id="togglePassword"></i>
                                    </div>
                                    <div class="form-text text-end"><span id="password_count">0</span> / 50</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required maxlength="50">
                                            <label for="password_confirmation">Konfirmasi Password</label>
                                        </div>
                                        <i class="fa fa-eye-slash toggle-password-icon" id="togglePasswordConfirmation"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="my-5">

                            <h5 class="mb-4">2. Informasi Usaha / Dapur</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Contoh: Dapur Bunda" required maxlength="100" data-counter-id="nama_usaha_count">
                                        <label for="nama_usaha">Nama Usaha / Dapur</label>
                                    </div>
                                    <div class="form-text text-end"><span id="nama_usaha_count">0</span> / 100</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="jenis_kuliner" name="jenis_kuliner" placeholder="Contoh: Masakan Sunda, Aneka Sambal" required maxlength="100" data-counter-id="jenis_kuliner_count">
                                        <label for="jenis_kuliner">Jenis Kuliner / Spesialisasi</label>
                                    </div>
                                    <div class="form-text text-end"><span id="jenis_kuliner_count">0</span> / 100</div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Jelaskan tentang usaha Anda" id="deskripsi" name="deskripsi" style="height: 100px" required maxlength="500" data-counter-id="deskripsi_count"></textarea>
                                        <label for="deskripsi">Deskripsi Singkat Usaha</label>
                                    </div>
                                    <div class="form-text text-end"><span id="deskripsi_count">0</span> / 500</div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Jl. Raya Cileungsi No. 123" id="alamat_usaha" name="alamat_usaha" style="height: 100px" required maxlength="255" data-counter-id="alamat_usaha_count"></textarea>
                                        <label for="alamat_usaha">Alamat Lengkap Usaha</label>
                                    </div>
                                    <div class="form-text text-end"><span id="alamat_usaha_count">0</span> / 255</div>
                                </div>
                                <div class="col-12">
                                    <label for="foto_masakan" class="form-label">Foto Contoh Masakan (Maks. 3 Foto)</label>
                                    <input class="form-control" type="file" id="foto_masakan" name="foto_masakan[]" multiple>
                                    <div class="form-text">Pilih foto terbaik yang paling mewakili masakan Anda. Maksimal 2MB per foto.</div>
                                </div>
                            </div>

                            <hr class="my-5">

                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="agreement" required>
                                        <label class="form-check-label" for="agreement">
                                            Saya telah membaca dan menyetujui <a href="#" data-bs-toggle="modal" data-bs-target="#syaratKetentuanModal">syarat & ketentuan</a> kemitraan Pesenin.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Kirim Pendaftaran</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Ganti bagian ini dengan kode footer Anda atau @include jika sudah dipisah --}}
         <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn">
            <div class="container py-5">
                <div class="row g-5">
                   <p class="text-center">© <a class="border-bottom" href="#">Pesenin</a>, All Right Reserved.</p>
                </div>
            </div>
         </div>
    </div>

    <!-- Modal Syarat & Ketentuan Start -->
    <div class="modal fade" id="syaratKetentuanModal" tabindex="-1" aria-labelledby="syaratKetentuanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="syaratKetentuanModalLabel">Syarat & Ketentuan Kemitraan Pesenin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyContent">
                    <p>Dengan mendaftar sebagai mitra "Pesenin", Anda ("Mitra") setuju untuk mematuhi syarat dan ketentuan di bawah ini. Harap dibaca dengan saksama hingga bagian paling bawah.</p>
    
                    <h6>1. Pendaftaran & Verifikasi</h6>
                    <ul>
                        <li>Mitra wajib memberikan data yang benar, valid, dan dapat dipertanggungjawabkan saat pendaftaran.</li>
                        <li>Tim "Pesenin" berhak melakukan verifikasi terhadap data dan lokasi usaha Mitra sebelum mengaktifkan akun.</li>
                        <li>Aktivasi akun akan dilakukan selambat-lambatnya 7 hari kerja setelah semua data dianggap valid.</li>
                    </ul>
    
                    <h6>2. Kualitas & Kebersihan Produk</h6>
                    <ul>
                        <li>Mitra bertanggung jawab penuh atas kualitas, kebersihan (higiene), dan keamanan semua produk makanan dan minuman yang dijual melalui platform "Pesenin".</li>
                        <li>Semua bahan yang digunakan harus halal (kecuali diberi keterangan khusus pada menu) dan layak konsumsi.</li>
                        <li>Pengemasan makanan harus rapi, aman, dan layak untuk proses pengiriman untuk menjaga kualitas produk hingga sampai ke tangan pelanggan.</li>
                    </ul>
    
                    <h6>3. Sistem Menu & Harga</h6>
                    <ul>
                        <li>Mitra wajib menyediakan informasi menu yang akurat, termasuk nama, deskripsi, dan foto produk yang sesuai dengan aslinya.</li>
                        <li>Harga yang tercantum di aplikasi "Pesenin" adalah harga final yang akan dibayar oleh pelanggan (di luar ongkos kirim).</li>
                        <li>Setiap perubahan menu atau harga harus diinformasikan kepada tim "Pesenin" minimal 3 hari sebelumnya.</li>
                    </ul>
    
                    <h6>4. Pembagian Hasil (Komisi)</h6>
                    <ul>
                        <li>"Pesenin" akan mengenakan biaya komisi sebesar 15% (lima belas persen) dari total harga produk untuk setiap pesanan yang berhasil.</li>
                        <li>Biaya komisi digunakan untuk operasional aplikasi, biaya pemasaran, dan layanan pelanggan.</li>
                        <li>Pencairan dana penjualan kepada Mitra akan dilakukan secara mingguan setiap hari Jumat, dengan laporan penjualan yang transparan.</li>
                    </ul>
    
                    <h6>5. Jam Operasional</h6>
                    <ul>
                        <li>Mitra diharapkan untuk mematuhi jam operasional yang telah didaftarkan untuk menjaga kepercayaan pelanggan.</li>
                        <li>Mitra wajib mengaktifkan status "Buka" pada aplikasi mitra selama jam operasional dan menonaktifkannya jika "Tutup" atau sedang istirahat.</li>
                    </ul>
                    
                    <h6>6. Foto & Konten Visual</h6>
                    <ul>
                        <li>Mitra mengizinkan "Pesenin" untuk menggunakan foto produk yang diberikan untuk keperluan promosi di platform "Pesenin" dan media sosial terkait.</li>
                        <li>Foto yang diunggah harus milik Mitra sendiri dan tidak melanggar hak cipta pihak lain.</li>
                    </ul>
    
                    <h6>7. Penilaian & Ulasan Pelanggan</h6>
                    <ul>
                        <li>Sistem penilaian dan ulasan dari pelanggan bertujuan untuk menjaga kualitas layanan secara keseluruhan.</li>
                        <li>Mitra diharapkan dapat menanggapi ulasan negatif secara profesional dan menjadikannya sebagai bahan perbaikan. "Pesenin" dapat memfasilitasi komunikasi jika diperlukan.</li>
                    </ul>
    
                    <h6>8. Kewajiban Pajak</h6>
                    <ul>
                        <li>Setiap Mitra bertanggung jawab penuh atas kewajiban pajaknya masing-masing sesuai dengan peraturan perundang-undangan yang berlaku di Indonesia.</li>
                    </ul>
    
                    <h6>9. Pembatalan & Penghentian Kerjasama</h6>
                    <ul>
                        <li>"Pesenin" berhak menonaktifkan sementara atau menghentikan kerjasama jika Mitra terbukti melanggar syarat dan ketentuan, seperti melakukan penipuan, manipulasi pesanan, atau menerima keluhan serius berulang kali dari pelanggan.</li>
                        <li>Mitra dapat mengajukan penghentian kerjasama dengan pemberitahuan tertulis 14 hari sebelumnya.</li>
                    </ul>
    
                    <p class="mt-4">Syarat dan ketentuan ini dapat diperbarui dari waktu ke waktu. Mitra akan menerima notifikasi jika ada perubahan yang signifikan.</p>
                    <p>Terakhir diperbarui: 27 Juni 2025</p>
    
                </div>
                <div class="modal-footer">
                    <div class="form-check me-auto">
                      <input class="form-check-input" type="checkbox" value="" id="modalAgreementCheck" disabled>
                      <label class="form-check-label" for="modalAgreementCheck">
                        Saya telah membaca dan mengerti
                      </label>
                      {{-- PETUNJUK BARU UNTUK PENGGUNA --}}
                      <div id="scroll-to-bottom-info" class="text-muted small">
                        <em>(Scroll ke bawah untuk mengaktifkan persetujuan)</em>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="btnMengerti" disabled>SAYA MENGERTI</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Syarat & Ketentuan End -->

     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/S&K.js') }}"></script>
    <script src="{{ asset('js/form-helpers.js') }}"></script>

    @if (session('success'))
    <script>
        Swal.fire({
            title: 'Pendaftaran Berhasil!',
            text: 'Terima kasih telah bergabung. Tim kami akan segera menghubungi Anda untuk proses verifikasi.',
            icon: 'success',
            confirmButtonText: 'Lanjutkan ke Halaman Login'
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke halaman login
                window.location.href = "{{ route('login') }}";
            }
        });
    </script>
    @endif


</body>

</html>