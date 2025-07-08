<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Pesenin Mitra | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-list"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('dist/assets/img/user2-160x160.jpg') }}" class="user-image rounded-circle shadow" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header text-bg-primary">
                                <img src="{{ asset('dist/assets/img/user2-160x160.jpg') }}" class="rounded-circle shadow" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Mitra Sejak {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profil</a>
                                <a href="#" class="btn btn-default btn-flat float-end" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                {{-- Ganti action dengan route logout Anda nanti --}}
                                <form id="logout-form" action="#" method="POST" style="display: none;">@csrf</form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="{{ route('mitra.mitra.dashboard') }}" class="brand-link">
                    <img src="{{ asset('dist/assets/img/AdminLTELogo.png') }}" alt="Pesenin Logo" class="brand-image opacity-75 shadow">
                    <span class="brand-text fw-light">Pesenin Mitra</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('mitra.mitra.dashboard') }}" class="nav-link {{ request()->routeIs('mitra.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-speedometer"></i><p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-header">MANAJEMEN</li>
                        <li class="nav-item {{ request()->routeIs('produk.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-box-seam-fill"></i>
                            <p>
                                Produk Saya
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('mitra.produk.index') }}" class="nav-link {{ request()->routeIs('produk.index') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Daftar Produk</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                         <li class="nav-item">
                            <a href="#" class="nav-link"><i class="nav-icon bi bi-receipt"></i><p>Pesanan Masuk</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mitra.laporan.index') }}" class="nav-link {{ request()->routeIs('mitra.laporan.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chart-pie"></i><p>Laporan Keuangan</p>
                            </a>
                        </li>
                        
                        


                    </ul>
                </nav>
            </div>
        </aside>
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">@yield('title')</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="app-footer">
            <strong>Copyright &copy; 2024-{{ date('Y') }} <a href="#">Pesenin</a>.</strong> All rights reserved.
        </footer>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>
</html>