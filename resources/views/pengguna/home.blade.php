{{-- Ganti blok tombol animasi Anda dengan kode ini --}}

@guest
    <div class="animated-auth-btn-container">
        <a href="{{ route('login') }}" class="auth-btn login-btn">Login</a>
        <a href="{{ route('register') }}" class="auth-btn register-btn">Daftar</a>
        <div class="main-text">
            <i class="fa fa-user-circle me-2"></i>Masuk / Daftar
        </div>
    </div>
@endguest

@auth
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-user me-2"></i>{{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu m-0">
            {{-- Tampilkan link ke dasbor HANYA jika rolenya mitra --}}
            @if(Auth::user()->role == 'mitra')
                <a href="{{ route('mitra.dashboard') }}" class="dropdown-item">Dasbor Saya</a>
            @endif
            
            {{-- Nanti bisa ditambahkan link ke halaman profil pengguna biasa --}}
            <a href="#" class="dropdown-item">Profil Saya</a>
            
            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
@endauth