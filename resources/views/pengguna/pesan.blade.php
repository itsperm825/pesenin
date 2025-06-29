<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pesan Makanan - Pesenin</title>
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
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div>
        </div>
        <div class="container-xxl position-relative p-0">
            @include('partials.navbar-user') {{-- Asumsi navbar dipisah, jika tidak, copy-paste kode navbar lengkap Anda --}}
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Pesan Sekarang</h5>
                    <h1 class="mb-5">Pilih Menu Favorit Anda</h1>
                </div>
                <div class="row g-5">
                    <div class="col-lg-8">
                        <div class="tab-class wow fadeInUp" data-wow-delay="0.1s">
                            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                                <li class="nav-item"><a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1"><i class="fa fa-utensils fa-2x text-primary"></i><div class="ps-3"><h6 class="mt-n1 mb-0">Nasi & Lauk</h6></div></a></li>
                                <li class="nav-item"><a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2"><i class="fa fa-leaf fa-2x text-primary"></i><div class="ps-3"><h6 class="mt-n1 mb-0">Sayuran</h6></div></a></li>
                                <li class="nav-item"><a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3"><i class="fa fa-cookie-bite fa-2x text-primary"></i><div class="ps-3"><h6 class="mt-n1 mb-0">Cemilan</h6></div></a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="row g-4">
                                        {{-- Contoh Item Menu --}}
                                        <div class="col-md-6">
                                            <div class="card h-100">
                                                <img src="{{ asset('img/menu/nasi-goreng-spesial.jpg') }}" class="card-img-top" alt="Nasi Goreng">
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title">Nasi Goreng Spesial</h5>
                                                    <p class="card-text">Nasi goreng dengan telur, ayam suwir, dan bakso.</p>
                                                    <div class="mt-auto d-flex justify-content-between align-items-center">
                                                        <span class="text-primary fw-bold fs-5">Rp 28.000</span>
                                                        <button class="btn btn-primary btn-sm add-to-cart-btn" data-id="1" data-name="Nasi Goreng Spesial" data-price="28000">Tambah</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Item Menu Lainnya --}}
                                        <div class="col-md-6">
                                            <div class="card h-100">
                                                <img src="{{ asset('img/menu/ayam-bakar.jpg') }}" class="card-img-top" alt="Ayam Bakar">
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title">Ayam Bakar Taliwang</h5>
                                                    <p class="card-text">Ayam bakar bumbu pedas khas Lombok.</p>
                                                    <div class="mt-auto d-flex justify-content-between align-items-center">
                                                        <span class="text-primary fw-bold fs-5">Rp 35.000</span>
                                                        <button class="btn btn-primary btn-sm add-to-cart-btn" data-id="2" data-name="Ayam Bakar Taliwang" data-price="35000">Tambah</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card shadow-sm position-sticky" style="top: 20px;">
                            <div class="card-header bg-primary text-white">
                                <h5 class="m-0"><i class="fa fa-shopping-cart me-2"></i>Keranjang Anda</h5>
                            </div>
                            <div class="card-body" id="cart-items" style="max-height: 400px; overflow-y: auto;">
                                <p class="text-muted text-center" id="empty-cart-message">Keranjang Anda masih kosong.</p>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total:</span>
                                    <span id="cart-total">Rp 0</span>
                                </div>
                                <button class="btn btn-success w-100 mt-3" id="checkout-btn" disabled>Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer') {{-- Asumsi footer dipisah, jika tidak, copy-paste kode footer Anda --}}
        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let cart = []; // Variabel untuk menyimpan item di keranjang

            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
            const cartItemsContainer = document.getElementById('cart-items');
            const cartTotalElement = document.getElementById('cart-total');
            const emptyCartMessage = document.getElementById('empty-cart-message');
            const checkoutBtn = document.getElementById('checkout-btn');

            // Event listener untuk semua tombol "Tambah"
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const price = parseInt(this.dataset.price);

                    addToCart(id, name, price);
                });
            });

            // Fungsi untuk menambahkan item ke keranjang
            function addToCart(id, name, price) {
                // Cek apakah item sudah ada di keranjang
                const existingItem = cart.find(item => item.id === id);

                if (existingItem) {
                    // Jika sudah ada, tambah jumlahnya
                    existingItem.quantity++;
                } else {
                    // Jika belum ada, tambahkan item baru
                    cart.push({ id, name, price, quantity: 1 });
                }
                
                renderCart(); // Update tampilan keranjang
            }

            // Fungsi untuk merender/menampilkan isi keranjang
            function renderCart() {
                cartItemsContainer.innerHTML = ''; // Kosongkan tampilan keranjang dulu
                let total = 0;

                if (cart.length === 0) {
                    cartItemsContainer.appendChild(emptyCartMessage);
                    emptyCartMessage.style.display = 'block';
                    checkoutBtn.disabled = true;
                } else {
                    emptyCartMessage.style.display = 'none';
                    checkoutBtn.disabled = false;

                    cart.forEach(item => {
                        total += item.price * item.quantity;

                        const cartItem = document.createElement('div');
                        cartItem.className = 'd-flex justify-content-between align-items-center mb-2';
                        cartItem.innerHTML = `
                            <div>
                                <h6 class="my-0">${item.name}</h6>
                                <small class="text-muted">Rp ${item.price.toLocaleString('id-ID')} x ${item.quantity}</small>
                            </div>
                            <span class="text-muted">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</span>
                        `;
                        cartItemsContainer.appendChild(cartItem);
                    });
                }

                cartTotalElement.innerText = `Rp ${total.toLocaleString('id-ID')}`;
            }

            // Render keranjang saat halaman pertama kali dimuat
            renderCart();
        });
    </script>
</body>
</html>