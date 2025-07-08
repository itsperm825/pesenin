<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pesenin</title>
    {{-- Menggunakan font dari template utama --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #FEA116;
            --dark: #0F172B;
            --light: #F1F8FF;
        }
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 30px;
            color: var(--dark);
            font-weight: 700;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(254, 161, 22, 0.2);
        }
        
        /* --- STYLE BARU UNTUK TOGGLE SWITCH ROLE --- */
        .role-selector-container {
            display: flex;
            background-color: #eee;
            border-radius: 8px;
            padding: 5px;
            margin-bottom: 25px;
        }
        .role-label {
            flex: 1; /* Membuat kedua pilihan sama lebar */
            padding: 10px;
            text-align: center;
            border-radius: 6px;
            color: #555;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .role-radio {
            display: none; /* Sembunyikan radio button asli */
        }
        /* Style untuk pilihan yang aktif */
        .role-radio:checked + .role-label {
            background-color: var(--primary);
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        }
        /* --- AKHIR STYLE BARU --- */

        .btn-login {
            background-color: var(--primary);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        .btn-login:hover {
            background-color: #e89215;
        }
        .alert-container {
            padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; color: #856404; background-color: #fff3cd; border-color: #ffeeba;
        }
        .link-container { margin-top: 20px; font-size: 0.9em; }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login Akun</h2>
        {{-- @if (session('success') || session('error'))
            <div class="alert-container">
                {{ session('success') ?? session('error') }}
            </div>
        @endif --}}

        {{-- INI DIA BAGIAN PENANGKAP SINYALNYA --}}
        @if (session('success'))
            <div class="alert-container">
                {{ session('success') }}
            </div>
        @endif
        {{-- AKHIR BAGIAN PENANGKAP SINYAL --}}

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <div class="role-selector-container">
                    <input type="radio" id="rolePengguna" name="role" value="pengguna" class="role-radio" checked>
                    <label for="rolePengguna" class="role-label">Pengguna</label>
                    
                    <input type="radio" id="roleMitra" name="role" value="mitra" class="role-radio">
                    <label for="roleMitra" class="role-label">Mitra</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email') <small style="color:red">{{$message}}</small> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="link-container">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
        </div>
    </div>
    @if (session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}", // Mengambil pesan dari session
            icon: 'success',
            confirmButtonColor: '#FEA116', // Warna tombol sesuai tema Anda
            confirmButtonText: 'OK'
        });
    </script>
    @endif

</body>
</html>