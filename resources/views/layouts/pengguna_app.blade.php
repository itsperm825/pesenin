<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Pesenin') - Pesan Makanan Favoritmu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- CSS Libraries --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    
    {{-- Main CSS --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">

    {{-- Slot untuk CSS tambahan per halaman --}}
    @stack('styles')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        {{-- Spinner Loading --}}
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="container-xxl position-relative p-0">
            {{-- Memanggil Navbar Terpisah --}}
            @include('partials.navbar-pengguna')

            {{-- Konten utama dari setiap halaman akan ditampilkan di sini --}}
            @yield('hero')
        </div>

        <main>
            @yield('content')
        </main>

        {{-- Memanggil Footer Terpisah (jika ada) --}}
        {{-- @include('partials.footer') --}}
    </div>

    {{-- JavaScript Libraries --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> {{-- Untuk notifikasi cantik --}}
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    {{-- Slot untuk JavaScript tambahan per halaman --}}
    @stack('scripts')
</body>
</html>