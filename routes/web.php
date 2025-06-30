<?php

use App\Http\Controllers\KemitraanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\MitraDashboardController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Mitra\ProdukController;

// Halaman utama aplikasi, mengarah ke SesiController method index
Route::get('/', [SesiController::class, 'index'])->name('home');

// Route untuk menampilkan form login
Route::get('/login', [SesiController::class, 'showLoginForm'])->name('login');

// Route untuk memproses data login dari form
Route::post('/login', [SesiController::class, 'login'])->name('login.post');

// --- Rute untuk Register ---
Route::get('/register', [SesiController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [SesiController::class, 'register'])->name('register.post');

// --- Rute untuk Kemitraan (BARU) ---
Route::get('/kemitraan', [KemitraanController::class, 'showKemitraan'])->name('kemitraan');
Route::get('/daftar-kemitraan', [KemitraanController::class, 'showDaftarKemitraanForm'])->name('daftar-kemitraan');
Route::post('/kemitraan/store', [KemitraanController::class, 'storeKemitraan'])->name('kemitraan.store');

// Rute untuk halaman home
Route::get('/tentang-kami', function () {return view('home.tentang-kami');})->name('tentang-kami');
Route::get('/kontak', function () {return view('home.kontak');})->name('kontak');
Route::get('/pelayanan', function () {return view('home.pelayanan');})->name('pelayanan');
Route::get('/menu', function () {return view('home.menu');})->name('menu');

// Route untuk memproses data dari form kontak
Route::post('/kontak/kirim', function () {return back()->with('success', 'Pesan Anda telah berhasil dikirim!');})->name('kontak.send');

// --- GRUP ROUTE KHUSUS UNTUK MITRA YANG SUDAH LOGIN ---
    // Route untuk halaman utama dasbor mitra

// --- GRUP ROUTE KHUSUS UNTUK PENGGUNA YANG SUDAH LOGIN --
Route::middleware(['auth', 'verified', 'role:pengguna'])->prefix('pengguna')->group(function () {
    Route::get('/beranda', function () {
        // Ini sudah benar karena Anda punya view di resources/views/user/beranda.blade.php
        return view('pengguna.beranda');
    })->name('pengguna.beranda');
});

// Rute Mitra (Pemeriksaan Peran Dinonaktifkan)
// Kita hanya menyisakan 'auth' dan 'verified'.
Route::middleware(['auth', 'verified'])->prefix('mitra')->group(function () {

    // PASTIKAN RUTE INI ADA PERSIS SEPERTI INI
    Route::get('/dashboard', function () {
        return view('mitra.dashboard');
    })->name('mitra.dashboard');

    Route::resource('produk', ProdukController::class);
});

// Rute Pengguna (Pemeriksaan Peran Dinonaktifkan)
Route::middleware(['auth', 'verified'])->prefix('pengguna')->group(function () {
    Route::get('/beranda', );
});

Route::get('/dashboard', function () {
    return view('mitra.dashboard'); // Arahkan ke view dashboard yang baru
})->name('mitra.dashboard');

    // --- TAMBAHKAN BARIS INI UNTUK MANAJEMEN PRODUK ---
    Route::resource('produk', ProdukController::class);
    // ----------------------------------------------------

    
