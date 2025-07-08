@extends('layouts.pengguna_app')

@section('title', 'Selamat Datang!')

@push('styles')
<style>
    /* CSS Kustom untuk tampilan yang lebih menarik */
    .category-item { text-decoration: none; color: var(--dark); }
    .category-item .icon-wrapper { width: 70px; height: 70px; background-color: #FFF5E7; transition: all 0.3s; }
    .category-item:hover .icon-wrapper { background-color: var(--primary); color: white !important; transform: translateY(-5px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    .product-card { border: 1px solid #eee; transition: all 0.3s; border-radius: 0.75rem; }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12); }
</style>
@endpush

@section('hero')
{{-- Bagian Hero Header dengan Banner Promosi --}}
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Selamat Datang,<br>{{ Str::words(Auth::user()->name, 2, '') }}!</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Pesan dari berbagai dapur mitra terbaik kami, diantar cepat dan hangat sampai ke depan pintu Anda.</p>
                <a href="#menu" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Jelajahi Menu</a>
            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="{{ asset('img/hero.png') }}" alt="Hero Image">
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-xxl py-5">
    <div class="container">

        {{-- BAGIAN KATEGORI PRODUK --}}
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Kategori</h5>
            <h1 class="mb-5">Pilih Kategori Favoritmu</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @if(isset($categories) && $categories->count() > 0)
                @foreach($categories as $category)
                <div class="col-lg-2 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="category-item d-block" href="#">
                        <div class="icon-wrapper rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2">
                            <i class="fa fa-utensils fs-2 text-primary"></i>
                        </div>
                        <h6 class="text-center">{{ $category->name ?? $category->nama_kategori }}</h6>
                    </a>
                </div>
                @endforeach
            @else
                <p class="text-center">Kategori belum tersedia.</p>
            @endif
        </div>

        <hr class="my-5">

        {{-- BAGIAN PRODUK REKOMENDASI --}}
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s" id="menu">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Rekomendasi</h5>
            <h1 class="mb-5">Menu Pilihan Untukmu</h1>
        </div>
        <div class="row g-4">
            @forelse ($produks as $produk)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card product-card h-100">
                        <img src="{{ $produk->gambar ? asset('storage/' . $produk->gambar) : 'https://via.placeholder.com/300' }}" class="card-img-top" alt="{{ $produk->nama_produk }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ Str::limit($produk->nama_produk, 25) }}</h5>
                            <small class="text-muted mb-2">
                                <i class="fa fa-store me-1"></i>
                                {{ $produk->user->mitra->nama_usaha ?? 'Pesenin' }}
                            </small>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <h6 class="text-primary fw-bold mb-0">Rp {{ number_format($produk->harga) }}</h6>
                                <button class="btn btn-primary btn-sm add-to-cart-btn"
                                        data-id="{{ $produk->id }}"
                                        data-nama="{{ $produk->nama_produk }}"
                                        data-harga="{{ $produk->harga }}"
                                        data-gambar="{{ $produk->gambar ? asset('storage/' . $produk->gambar) : 'https://via.placeholder.com/150' }}">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><p class="text-center">Belum ada produk yang tersedia.</p></div>
            @endforelse
        </div>
        <div class="mt-5 d-flex justify-content-center">
            {{ $produks->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Kode JavaScript untuk fitur 'Tambah ke Keranjang' --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    function getCart() {
        return JSON.parse(localStorage.getItem('shopping_cart')) || [];
    }

    function saveCart(cart) {
        localStorage.setItem('shopping_cart', JSON.stringify(cart));
        updateCartIconCount();
    }

    function updateCartIconCount() {
        let cart = getCart();
        let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        const cartCountElement = document.getElementById('cart-count');
        if (cartCountElement) {
            cartCountElement.innerText = totalItems;
            cartCountElement.style.display = totalItems > 0 ? 'inline-flex' : 'none';
        }
    }

    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            const product = {
                id: this.dataset.id,
                name: this.dataset.nama,
                price: parseInt(this.dataset.harga),
                image: this.dataset.gambar,
                quantity: 1
            };
            
            let cart = getCart();
            let existingItem = cart.find(item => item.id === product.id);

            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push(product);
            }

            saveCart(cart);

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: `${product.name} ditambahkan!`,
                showConfirmButton: false,
                timer: 1500
            });
        });
    });

    // Panggil saat halaman dimuat untuk menampilkan jumlah awal
    updateCartIconCount();
});
</script>
@endpush