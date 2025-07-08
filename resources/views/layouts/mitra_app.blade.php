<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dasbor Mitra - Pesenin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-dark border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 text-primary fs-4 fw-bold text-uppercase border-bottom">
                <i class="fa fa-utensils me-2"></i>Pesenin
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-light active"><i class="fas fa-tachometer-alt me-2"></i>Dasbor</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-light fw-bold"><i class="fas fa-shopping-cart me-2"></i>Manajemen Pesanan</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-light fw-bold"><i class="fas fa-book-open me-2"></i>Manajemen Menu</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-light fw-bold"><i class="fas fa-chart-bar me-2"></i>Laporan Pendapatan</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-light fw-bold"><i class="fas fa-cog me-2"></i>Pengaturan Dapur</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text-primary fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">@yield('title', 'Dasbor')</h2>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>{{ Auth::user()->name ?? 'Nama Mitra' }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="container-fluid px-4">
                @yield('content')
            </main>
        </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>
        import Swal from 'sweetalert2/dist/sweetalert2.js'
        import 'sweetalert2/src/sweetalert2.scss'

        // or via CommonJS
        const Swal = require('sweetalert2')

        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    @yield('scripts')
</body>
</html>