<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Import model Product
use Illuminate\Support\Facades\Auth; // Import Auth

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah produk yang dimiliki oleh mitra yang sedang login
        $jumlahProduk = Product::where('user_id', Auth::id())->count();

        // Nantinya Anda bisa menambahkan data lain di sini
        // $jumlahPesanan = Order::where(...)->count();

        // Kirim data tersebut ke view
        return view('mitra.dashboard', [
            'jumlahProduk' => $jumlahProduk
            // 'jumlahPesanan' => $jumlahPesanan
        ]);
    }
}