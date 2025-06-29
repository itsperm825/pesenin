<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Aplikasi Anda</title> {{-- Sesuaikan judul --}}
    <link rel="stylesheet" href="{{ asset('css/authrg.css') }}"> {{-- Link ke file CSS terpisah --}}
    {{-- Anda bisa juga menambahkan link ke Bootstrap/TailwindCSS jika digunakan --}}
</head>
<body>
    <div class="register-container">
        <h2>Daftar Akun Baru</h2> {{-- Judul yang lebih menarik --}}

        {{-- Menampilkan pesan sukses sesi jika ada --}}
        @if (session('success'))
            <div class="alert alert-success"> {{-- Menggunakan div untuk alert --}}
                {{ session('success') }}
            </div>
        @endif

        {{-- Menampilkan pesan error validasi umum jika ada (misal: jika ada error selain di input spesifik) --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf {{-- Token CSRF wajib untuk keamanan --}}

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            {{-- BAGIAN PILIHAN ROLE DIHAPUS DARI SINI --}}

            <button type="submit" class="btn btn-primary">Daftar Akun</button>
        </form>

        {{-- TAMBAHKAN LINK UNTUK MITRA DI SINI --}}
        <p class="login-link">Ingin bergabung sebagai Mitra Penjual? <a href="{{ route('kemitraan') }}">Daftar di sini</a></p>
        <p class="login-link">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </div>
</body>
</html>