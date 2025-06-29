<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User; // Penting: Pastikan model User sudah ada dan diimport
use Illuminate\Support\Facades\Hash; // Untuk hashing password

class AuthController extends Controller
{
   
    public function showLoginForm()
    {
        return view('login'); // Mencari resources/views/login.blade.php
    }

    public function showRegisterForm()
    {
        return view('register'); // Mencari resources/views/register.blade.php
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // 'confirmed' akan memeriksa input password_confirmation
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum menyimpan
            'role' => 'userpem', 'userpen'
        ]);

        // Opsional: Langsung login setelah register
        Auth::login($user);

        // Redirect ke halaman yang diinginkan setelah register sukses
        return redirect('/dashboard')->with('success', 'Pendaftaran berhasil! Kamu sudah login.');
        // Atau, jika tidak langsung login, bisa kembalikan ke halaman login
        // return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}