<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesenin - Nikmati Masakan Rumahan Asli!</title>
    <link rel="stylesheet" href="{{ asset('css/style-copy.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <h1>Pesenin</h1>
        </div>
        <nav class="nav-links">
            <a href="#">Beranda</a>
            <a href="#">Bagaimana Memesan</a> 
            <a href="#">Tentang Kami</a>    
            <a href="#">Jadi Mitra</a>      
            <a href="#">FAQ</a>
        </nav>
        <div class="auth-buttons">
            <a href=" {{ route('login') }} " class="btn-login">Masuk</a>
            <a href=" {{ route('register') }}" class="btn-register">Daftar Sekarang</a>
        </div>
    </header>

    <main>
        <section class="hero-section">
            <div class="hero-content">
                <h2>Nikmati Lezatnya Masakan Rumahan Asli, Cukup #PeseninAja</h2>
                <p>Jelajahi beragam hidangan autentik dari dapur-dapur pilihan di sekitar Anda. Rasa otentik, kualitas terjamin, siap antar ke pintu Anda!</p>
                <div class="hero-cta-group">
                    <button class="cta-button">Jelajahi Menu!</button>
                    <button class="how-it-works-button">Pesan Sekarang</button>
                </div>
            </div>
        </section>

        <section class="search-and-filter-open">
            <div class="search-input-main">
                <input type="text" placeholder="Cari masakan, nama penjual, atau lokasi...">
                <button><i class="fas fa-search"></i> Cari</button>
            </div>
            <div class="filters">
                <button class="filter-button active">Semua</button>
                <button class="filter-button">Populer</button>
                <button class="filter-button">Terlaris</button>
                <button class="filter-button">Trending</button>
                <button class="filter-button">Masakan Jawa</button>
                <button class="filter-button">Masakan Sunda</button>
                <button class="filter-button">Menu Sehat</button>
            </div>
        </section>

        <section class="food-display-section">
            <h3 class="section-title">Masakan Rumahan Pilihan untuk Anda</h3>
            <p class="section-subtitle">Temukan hidangan lezat yang paling banyak dicari dan disukai pelanggan kami.</p>

            <div class="food-grid">
                <div class="food-card">
                    <img src="https://via.placeholder.com/300x200/FFD700/FFFFFF?text=Nasi+Goreng+Kampung" alt="Nasi Goreng Kampung">
                    <div class="food-info">
                        <h4>Nasi Goreng Kampung Komplit</h4>
                        <p class="vendor-name">Dapur Bu Rita</p>
                        <div class="rating-review">
                            <span class="rating-stars"><i class="fas fa-star"></i> 4.9</span>
                            <span class="reviews">(250 Ulasan)</span>
                        </div>
                        <p class="short-desc">Nasi goreng otentik dengan telur mata sapi dan ayam suwir.</p>
                        <button class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i> Tambah</button>
                        <p class="login-prompt"><i class="fas fa-info-circle"></i> Login untuk memesan</p>
                    </div>
                </div>

                <div class="food-card">
                    <img src="https://via.placeholder.com/300x200/A2BA71/FFFFFF?text=Ayam+Bakar+Madu" alt="Ayam Bakar Madu">
                    <div class="food-info">
                        <h4>Ayam Bakar Madu Spesial</h4>
                        <p class="vendor-name">Pawon Mang Ujang</p>
                        <div class="rating-review">
                            <span class="rating-stars"><i class="fas fa-star"></i> 4.8</span>
                            <span class="reviews">(180 Ulasan)</span>
                        </div>
                        <p class="short-desc">Ayam bakar empuk dengan bumbu madu khas, lengkap dengan sambal.</p>
                        <button class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i> Tambah</button>
                        <p class="login-prompt"><i class="fas fa-info-circle"></i> Login untuk memesan</p>
                    </div>
                </div>

                <div class="food-card">
                    <img src="https://via.placeholder.com/300x200/ADD8E6/FFFFFF?text=Sop+Iga+Sapi" alt="Sop Iga Sapi">
                    <div class="food-info">
                        <h4>Sop Iga Sapi Rempah</h4>
                        <p class="vendor-name">Dapur Makmur</p>
                        <div class="rating-review">
                            <span class="rating-stars"><i class="fas fa-star"></i> 4.7</span>
                            <span class="reviews">(120 Ulasan)</span>
                        </div>
                        <p class="short-desc">Sop iga sapi dengan kuah bening kaya rempah, menghangatkan.</p>
                        <button class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i> Tambah</button>
                        <p class="login-prompt"><i class="fas fa-info-circle"></i> Login untuk memesan</p>
                    </div>
                </div>
                <div class="food-card">
                    <img src="https://via.placeholder.com/300x200/F08080/FFFFFF?text=Sate+Lilit+Bali" alt="Sate Lilit Bali">
                    <div class="food-info">
                        <h4>Sate Lilit Ayam Bali</h4>
                        <p class="vendor-name">Warung Bali Ibu Made</p>
                        <div class="rating-review">
                            <span class="rating-stars"><i class="fas fa-star"></i> 4.9</span>
                            <span class="reviews">(95 Ulasan)</span>
                        </div>
                        <p class="short-desc">Sate lilit ayam khas Bali, gurih dan beraroma rempah.</p>
                        <button class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i> Tambah</button>
                        <p class="login-prompt"><i class="fas fa-info-circle"></i> Login untuk memesan</p>
                    </div>
                </div>

                 <div class="food-card">
                    <img src="https://via.placeholder.com/300x200/DAA520/FFFFFF?text=Rawon+Khas+Surabaya" alt="Rawon">
                    <div class="food-info">
                        <h4>Rawon Daging Surabaya</h4>
                        <p class="vendor-name">Dapur Bu Siti</p>
                        <div class="rating-review">
                            <span class="rating-stars"><i class="fas fa-star"></i> 4.7</span>
                            <span class="reviews">(110 Ulasan)</span>
                        </div>
                        <p class="short-desc">Rawon kuah hitam pekat dengan daging sapi empuk.</p>
                        <button class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i> Tambah</button>
                        <p class="login-prompt"><i class="fas fa-info-circle"></i> Login untuk memesan</p>
                    </div>
                </div>

                <div class="food-card">
                    <img src="https://via.placeholder.com/300x200/778899/FFFFFF?text=Gudeg+Jogja" alt="Gudeg Jogja">
                    <div class="food-info">
                        <h4>Gudeg Komplit Jogja</h4>
                        <p class="vendor-name">Dapur Mbah Wati</p>
                        <div class="rating-review">
                            <span class="rating-stars"><i class="fas fa-star"></i> 4.8</span>
                            <span class="reviews">(160 Ulasan)</span>
                        </div>
                        <p class="short-desc">Gudeg nangka muda manis gurih, krecek pedas, dan telur.</p>
                        <button class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i> Tambah</button>
                        <p class="login-prompt"><i class="fas fa-info-circle"></i> Login untuk memesan</p>
                    </div>
                </div>

            </div>
        </section>

        <section class="app-testimonials">
            <p class="testimonial-pretitle">Ulasan Pengguna</p>
            <h3 class="section-title">Apa Kata <span class="highlight-text">Mereka</span> Tentang Aplikasi Pesenin?</h3>
            <p class="section-subtitle">Dengar langsung pengalaman pengguna yang <span class="highlight-text">puas</span> dengan platform kami.</p>
            <div class="testimonial-slider-wrapper">
                <div class="testimonial-grid-slider">
                    <div class="testimonial-card">
                        <div class="rating-app">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                        <p class="quote">"Pesenin mengubah cara saya makan di rumah! Aplikasi mudah digunakan, pilihan makanan rumahan yang autentik dan pengiriman selalu tepat waktu. Sangat direkomendasikan!"</p>
                        <div class="client-profile">
                            <img src="https://via.placeholder.com/60x60/B0C4DE/FFFFFF?text=SW" alt="Sarah W.">
                            <div class="client-info">
                                <p class="author">Sarah W.</p>
                                <p class="profession">Ibu Rumah Tangga</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="rating-app">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                        <p class="quote">"Sebagai mahasiswa rantau, Pesenin jadi penyelamat! Bisa makan masakan rumahan tanpa ribet. Fitur pencarian dan filter sangat membantu."</p>
                        <div class="client-profile">
                            <img src="https://via.placeholder.com/60x60/FFA07A/FFFFFF?text=RP" alt="Rio P.">
                            <div class="client-info">
                                <p class="author">Rio P.</p>
                                <p class="profession">Mahasiswa</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="rating-app">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                        <p class="quote">"Sangat cocok untuk pekerja sibuk seperti saya. Tidak perlu masak, tinggal 'Pesenin' saja. Rasa enak, harga bersahabat. Fitur reward juga menarik!"</p>
                        <div class="client-profile">
                            <img src="https://via.placeholder.com/60x60/ADD8E6/FFFFFF?text=DS" alt="Dian S.">
                            <div class="client-info">
                                <p class="author">Dian S.</p>
                                <p class="profession">Karyawan Swasta</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="rating-app">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                        </div>
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                        <p class="quote">"Pengalaman menggunakan Pesenin sangat menyenangkan. Proses pemesanan mudah dan cepat, dan kualitas makanan rumahan selalu terjaga."</p>
                        <div class="client-profile">
                            <img src="https://via.placeholder.com/60x60/98FB98/FFFFFF?text=BH" alt="Budi H.">
                            <div class="client-info">
                                <p class="author">Budi H.</p>
                                <p class="profession">Wiraswasta</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="rating-app">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                        <p class="quote">"Saya suka sekali dengan variasi makanan yang ditawarkan Pesenin. Banyak pilihan dapur rumahan dengan menu-menu unik yang belum pernah saya coba sebelumnya."</p>
                        <div class="client-profile">
                            <img src="https://via.placeholder.com/60x60/DDA0DD/FFFFFF?text=LK" alt="Linda K.">
                            <div class="client-info">
                                <p class="author">Linda K.</p>
                                <p class="profession">Pegawai Negeri</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div class="rating-app">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i>
                        </div>
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                        <p class="quote">"Pengiriman dari Pesenin selalu on time. Kurirnya ramah dan sopan. Makanannya juga masih hangat saat sampai. Pelayanan yang memuaskan!"</p>
                        <div class="client-profile">
                            <img src="https://via.placeholder.com/60x60/87CEEB/FFFFFF?text=AP" alt="Anton P.">
                            <div class="client-info">
                                <p class="author">Anton P.</p>
                                <p class="profession">Freelancer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-pagination">
                </div>
        </section>

    </main>

    <footer>
        <p>&copy; 2025 Pesenin. Semua Hak Dilindungi.</p>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sliderWrapper = document.querySelector('.testimonial-slider-wrapper');
            const slider = document.querySelector('.testimonial-grid-slider');
            const testimonialCards = document.querySelectorAll('.testimonial-card');
            const paginationContainer = document.querySelector('.testimonial-pagination');
            let currentIndex = 0;
            let autoSlideInterval;
            const slideDuration = 5000; // 5 detik untuk pergeseran otomatis

            // Buat indikator titik
            testimonialCards.forEach((_, index) => {
                const dot = document.createElement('span');
                dot.classList.add('dot');
                dot.setAttribute('data-index', index);
                dot.addEventListener('click', () => showSlide(index));
                paginationContainer.appendChild(dot);
            });

            const dots = document.querySelectorAll('.testimonial-pagination .dot');

            // Fungsi untuk menampilkan slide
            function showSlide(index) {
                // Handle looping
                if (index < 0) {
                    index = testimonialCards.length - 1;
                } else if (index >= testimonialCards.length) {
                    index = 0;
                }
                currentIndex = index;

                // Hitung offset untuk menggeser slider
                const cardComputedStyle = window.getComputedStyle(testimonialCards[0]);
                const cardWidthWithMargin = testimonialCards[0].offsetWidth +
                                            parseFloat(cardComputedStyle.marginLeft) +
                                            parseFloat(cardComputedStyle.marginRight);

                const wrapperWidth = sliderWrapper.offsetWidth;
                const totalCardsWidth = testimonialCards.length * cardWidthWithMargin;

                // Inisialisasi offset untuk memastikan kartu aktif berada di tengah
                let offset = (wrapperWidth / 2) - (cardWidthWithMargin / 2) - (currentIndex * cardWidthWithMargin);

                // Batasi offset agar tidak bergerak terlalu jauh
                const maxOffsetRight = 0; // Paling kanan bisa 0 (atau sedikit positif jika kartu kurang)
                const maxOffsetLeft = wrapperWidth - totalCardsWidth; // Paling kiri

                if (offset > maxOffsetRight) {
                    offset = maxOffsetRight;
                }
                if (offset < maxOffsetLeft) {
                    offset = maxOffsetLeft;
                }
                
                slider.style.transform = `translateX(${offset}px)`;

                // Update kelas aktif pada kartu dan titik
                testimonialCards.forEach((card, i) => {
                    if (i === currentIndex) {
                        card.classList.add('active');
                    } else {
                        card.classList.remove('active');
                    }
                });

                dots.forEach((dot, i) => {
                    if (i === currentIndex) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });

                resetAutoSlide(); // Reset interval setiap kali slide berubah
            }

            // Fungsi untuk menggeser ke slide berikutnya
            function nextSlide() {
                showSlide(currentIndex + 1);
            }

            // Fungsi untuk mereset auto-slide
            function resetAutoSlide() {
                clearInterval(autoSlideInterval);
                autoSlideInterval = setInterval(nextSlide, slideDuration);
            }

            // Inisialisasi slider saat halaman dimuat
            showSlide(0); // Tampilkan slide pertama saat dimuat
            resetAutoSlide(); // Mulai auto-slide

            // Optional: Handle window resize untuk responsivitas offset
            window.addEventListener('resize', () => {
                showSlide(currentIndex); // Recalculate position
            });
        });
    </script>
</body>
</html>