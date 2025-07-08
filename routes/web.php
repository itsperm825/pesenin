<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\KemitraanController;
use App\Http\Controllers\Mitra\DashboardController as MitraDashboardController;
use App\Http\Controllers\Mitra\ProdukController;
use App\Http\Controllers\Mitra\OrderController;
use App\Http\Controllers\Pengguna\DashboardController as PenggunaDashboardController;
use App\Http\Controllers\Pengguna\CartController;
use App\Http\Controllers\Mitra\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Di sini adalah tempat Anda bisa mendaftarkan rute web untuk aplikasi Anda.
*/

// ======================================================================
// RUTE PUBLIK (Bisa diakses oleh semua orang)
// ======================================================================

Route::get('/', [SesiController::class, 'index'])->name('home');

// Rute untuk Autentikasi (Login & Register)
Route::get('/login', [SesiController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SesiController::class, 'login'])->name('login.post');
Route::get('/register', [SesiController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [SesiController::class, 'register'])->name('register.post');
Route::post('/logout', [SesiController::class, 'logout'])->name('logout'); // Menambahkan rute logout

// Rute untuk halaman statis dan pendaftaran kemitraan
Route::get('/tentang-kami', function () { return view('home.tentang-kami'); })->name('tentang-kami');
Route::get('/kontak', function () { return view('home.kontak'); })->name('kontak');
Route::post('/kontak/kirim', function () { return back()->with('success', 'Pesan Anda telah berhasil dikirim!'); })->name('kontak.send');
Route::get('/pelayanan', function () { return view('home.pelayanan'); })->name('pelayanan');
Route::get('/menu', function () { return view('home.menu'); })->name('menu');
Route::get('/kemitraan', [KemitraanController::class, 'showKemitraan'])->name('kemitraan');
Route::get('/daftar-kemitraan', [KemitraanController::class, 'showDaftarKemitraanForm'])->name('daftar-kemitraan');
Route::post('/kemitraan/store', [KemitraanController::class, 'store'])->name('kemitraan.store');


// ======================================================================
// RUTE UNTUK PENGGUNA YANG SUDAH LOGIN
// ======================================================================

// --- Grup Rute Khusus untuk PENGGUNA ---
Route::middleware(['auth', 'verified', /*'role:pengguna' */])->prefix('pengguna')->name('pengguna.')->group(function () {
    Route::get('/beranda', [PenggunaDashboardController::class, 'index'])->name('beranda');
    // Tambahkan rute lain untuk pengguna di sini
    // di dalam grup pengguna
    Route::get('/keranjang', function() {
        return view('pengguna.cart');
    })->name('pengguna.keranjang');
    // routes/web.php (di dalam grup 'pengguna')

    // --- TAMBAHKAN RUTE INI UNTUK KERANJANG ---
    Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');
    // ------------------------------------------
});

// --- Grup Rute Khusus untuk MITRA ---
Route::middleware(['auth', 'verified', /*'role:mitra'*/])
->prefix('mitra')
->name('mitra.') 
->group(function () {
    Route::get('/dashboard', [MitraDashboardController::class, 'index'])->name('mitra.dashboard');
    
    // --- TAMBAHKAN RUTE INI UNTUK CETAK PDF ---
    // PASTIKAN RUTE INI ADA DAN BENAR
    Route::get('/produk/cetak', [ProdukController::class, 'cetak'])->name('produk.cetak');

    // Rute untuk manajemen produk (CRUD)
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::resource('produk', ProdukController::class);
    //Rute untuk

    // Rute untuk manajemen pesanan
    Route::get('/pesanan', [OrderController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/{order}', [OrderController::class, 'show'])->name('pesanan.show');

     // --- TAMBAHKAN RUTE INI UNTUK LAPORAN ---
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
   
});


// Catatan: File asli Anda memiliki rute 'pesan' yang terpisah.
// Jika ini untuk pengguna, sebaiknya dimasukkan ke dalam grup 'pengguna'.
// Untuk saat ini saya biarkan terpisah sesuai file asli Anda.
Route::middleware(['auth', 'verified'])->prefix('pesan')->group(function () {
    // Route::get('/', function () {
    //     return view('pesan.index');
    // })->name('pesan.index');
});
