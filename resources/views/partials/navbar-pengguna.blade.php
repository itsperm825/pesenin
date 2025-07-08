<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0 sticky-top shadow-sm">
    <a href="{{ route('pengguna.beranda') }}" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><img src="{{ asset('img/pesenin-logo.png') }}" alt="Logo"> Pesenin</h1>
    </a>
    
    {{-- Search Bar di Tengah (ala GoFood) --}}
    <div class="d-none d-lg-flex flex-grow-1 px-5">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari makanan atau minuman...">
            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-2 pe-4 align-items-center">
            {{-- Ikon Notifikasi & Keranjang --}}
            <a href="#" class="nav-item nav-link position-relative me-2">
                <i class="fa fa-bell fs-5"></i>
            </a>
            <a href="{{ route('pengguna.keranjang') }}" class="nav-item nav-link position-relative me-3">
                <i class="fa fa-shopping-cart fs-5"></i>
                <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6em; padding: 0.3em 0.5em; display: none;">0</span>
            </a>

            {{-- Menu Profil Pengguna --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-user me-2"></i>{{ Str::words(Auth::user()->name, 1, '') }}
                </a>
                <div class="dropdown-menu m-0">
                    <a href="#" class="dropdown-item">Profil Saya</a>
                    <a href="#" class="dropdown-item">Riwayat Pesanan</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>