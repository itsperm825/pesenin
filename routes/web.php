<?php

use App\Http\Controllers\KemitraanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\MitraDashboardController;
use App\Http\Controllers\PenggunaController;

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

// --- GRUP ROUTE KHUSUS UNTUK PENGGUNA YANG SUDAH LOGIN ---
Route::middleware(['auth', 'role:pengguna'])->prefix('pengguna')->group(function () {
    Route::get('/beranda', [App\Http\Controllers\PenggunaController::class, 'beranda'])->name('pengguna.beranda');
});


// ... (semua route lain di atasnya)

// --- GRUP ROUTE KHUSUS UNTUK MITRA (WAJIB LOGIN & ROLE MITRA) ---
Route::middleware(['auth', 'is-mitra'])
    ->prefix('mitra')
    ->name('mitra.') // <-- KUNCI PERBAIKAN: Pastikan ada titik (.) di akhir 'mitra.'
    ->group(function () {
    
    // Route ini sekarang akan memiliki nama lengkap 'mitra.beranda'
    Route::get('/beranda', [App\Http\Controllers\MitraDashboardController::class, 'index'])->name('beranda');

    // Contoh untuk masa depan, route ini akan bernama 'mitra.profil'
    // Route::get('/profil', ...)->name('profil');
});

// ... (grup route untuk pengguna)
