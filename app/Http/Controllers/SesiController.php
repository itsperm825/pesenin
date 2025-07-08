<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SesiController extends Controller
{
    public function index() {
        return view('home.index');
    }

    public function showLoginForm() {
        return view('home.login');
    }

    public function showRegisterForm() {
        return view('home.register');
    }

    // app/Http/Controllers/SesiController.php

    public function login(Request $request)
    {
        // 1. Validasi input form. Peran tidak perlu divalidasi di sini.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba lakukan autentikasi HANYA dengan email dan password
        if (Auth::attempt($credentials)) {
            
            // 3. Pengecekan peran SETELAH login berhasil
            // Ini memastikan user 'mitra' tidak bisa login via tab 'pengguna' dan sebaliknya
            $user = Auth::user();
            if ($user->role !== $request->role) {
                Auth::logout(); // Jika peran tidak cocok, paksa logout lagi
                return back()->withErrors([
                    'email' => 'Anda mencoba login dengan tipe akun yang salah.',
                ])->onlyInput('email');
            }

            // 4. Jika semua cocok, regenerasi session
            $request->session()->regenerate();

            // 5. Arahkan ke halaman yang benar menggunakan method redirectTo()
            return redirect()->intended($this->redirectTo());
        }

        // 6. Jika email atau password salah
        return back()->withErrors([
            'email' => 'Email atau Password yang Anda masukkan tidak valid.',
        ])->onlyInput('email');
    }

    public function redirectTo()
    {
        // Ambil data peran dari user yang baru saja login
        $role = Auth::user()->role;

        // Gunakan switch case untuk menentukan URL tujuan
        switch ($role) {
            case 'admin':
                return '/admin/dashboard'; // Ganti dengan URL dasbor admin Anda
                break;
            case 'mitra':
                return '/mitra/dashboard'; // URL dasbor mitra
                break;
            case 'pengguna':
                return '/pengguna/beranda'; // URL dasbor pengguna
                break;
            default:
                return '/home'; // URL default jika peran tidak dikenali
                break;
        }
    }
    
    public function register(Request $request)
    {
        // ... (bagian validasi data Anda) ...

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // Mungkin ada field lain di sini
        ]);

        // --- INI DIA BAGIAN PENTINGNYA ---
        // Secara otomatis berikan peran 'pengguna' ke user yang baru dibuat.
        // $user->assignRole('pengguna');
        // ------------------------------------

        Auth::login($user);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}