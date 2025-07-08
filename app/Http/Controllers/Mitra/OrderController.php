<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Order; // Import model Order
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth

class OrderController extends Controller
{
    /**
     * Menampilkan daftar pesanan yang berisi produk milik mitra yang sedang login.
     */
    public function index()
    {
        $mitraId = Auth::id();

        // Ini adalah query yang canggih menggunakan Eloquent Relationship.
        // Artinya: "Carikan saya semua Pesanan (Order) yang...
        // ...memiliki (whereHas) item di dalamnya...
        // ...di mana produk dari item tersebut...
        // ...memiliki user_id yang sama dengan ID mitra yang sedang login."
        $orders = Order::whereHas('items.product', function ($query) use ($mitraId) {
            $query->where('user_id', $mitraId);
        })
        ->with('user') // Eager load data pemesan untuk efisiensi
        ->latest() // Urutkan dari yang terbaru
        ->paginate(10); // Ambil 10 pesanan per halaman

        return view('mitra.pesanan.index', compact('orders'));
    }

    /**
     * Menampilkan detail dari satu pesanan.
     */
    public function show(Order $order)
    {
        $mitraId = Auth::id();

        // Otorisasi: Pastikan mitra hanya bisa melihat detail pesanan yang relevan baginya.
        // Kita cek apakah ada setidaknya satu item di pesanan ini yang produknya milik si mitra.
        $isAuthorized = $order->items()->whereHas('product', function ($query) use ($mitraId) {
            $query->where('user_id', $mitraId);
        })->exists();

        if (!$isAuthorized) {
            abort(403, 'AKSES DITOLAK.');
        }

        // Load relasi agar bisa digunakan di view
        $order->load('items.product', 'user');

        return view('mitra.pesanan.show', compact('order'));
    }
}