<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // <-- Import model Product
use App\Models\Category; // <-- Import model Category


class DashboardController extends Controller
{
    /**
     * Menampilkan halaman utama/beranda untuk pengguna.
     */
    public function index()
    {
        // Kode yang benar untuk menggunakan pagination
        $produks = Product::with('user.mitra')->latest()->paginate(8); // Ganti take(8)->get() menjadi paginate(8)
        // Ambil kategori untuk ditampilkan sebagai ikon
        $categories = Category::take(6)->get(); // Ambil 6 kategori

        // Kirim semua data ke view
        return view('pengguna.beranda', compact('produks', 'categories'));
    
    }
        
}