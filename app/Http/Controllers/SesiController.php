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

    public function login(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
            "role" => "required|in:pengguna,mitra",
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role == 'mitra') {
                return redirect()->route('mitra.beranda');
            }
            // Defaultnya adalah pengguna
            return redirect()->route('pengguna.beranda');
        }

        return redirect()->back()
            ->with('error', 'Login gagal! Pastikan email, password, dan tipe akun Anda sudah benar.')
            ->withInput($request->except('password'));
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pengguna',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login untuk melanjutkan.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}