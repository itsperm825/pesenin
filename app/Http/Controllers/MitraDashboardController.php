<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // Tambahkan ini untuk format tanggal

class MitraDashboardController extends Controller
{
    public function index()
    {
       
    // ... (sisa kode Anda)

        // Di sini Anda bisa mengambil data asli dari database
        // Untuk sekarang kita gunakan data dummy
        $newOrdersCount = 5;
        $todaysRevenue = 750000;
        $totalProducts = 25; // Data baru untuk total produk
        
        // Mengatur locale Carbon ke Indonesia
        Carbon::setLocale('id');

        return view('mitra.dashboard', [
            'newOrdersCount' => $newOrdersCount,
            'todaysRevenue' => $todaysRevenue,
            'totalProducts' => $totalProducts, // Kirim data baru ke view
        ]);
    }
}