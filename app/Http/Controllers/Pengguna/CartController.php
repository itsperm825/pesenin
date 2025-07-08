<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    // Method untuk menampilkan halaman keranjang
    public function index()
    {
        return view('pengguna.cart'); // Asumsi Anda punya view ini
    }

    // Method BARU untuk memproses pesanan
    public function processCheckout(Request $request)
    {
        // Validasi data dari form checkout (alamat, dll)
        $request->validate([
            'alamat_pengiriman' => 'required|string|max:255',
            'telepon_pengiriman' => 'required|string|max:15',
            'cart_data' => 'required|json' // Data keranjang dari frontend
        ]);

        $cart = json_decode($request->cart_data, true);

        // Gunakan DB Transaction untuk keamanan data
        try {
            DB::beginTransaction();

            // 1. Buat pesanan utama
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_harga' => collect($cart)->sum(function($item) {
                    return $item['price'] * $item['quantity'];
                }),
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'telepon_pengiriman' => $request->telepon_pengiriman,
                'status' => 'Menunggu Konfirmasi',
            ]);

            // 2. Loop & simpan setiap item, kurangi stok
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'jumlah' => $item['quantity'],
                    'harga' => $item['price'],
                ]);

                // Kurangi stok produk
                $product = Product::find($item['id']);
                $product->stok -= $item['quantity'];
                $product->save();
            }

            DB::commit();

            // Redirect ke halaman sukses dengan membawa ID pesanan
            return redirect()->route('pengguna.order.success', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            // Redirect kembali dengan pesan error
            return back()->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }
    
    // Method BARU untuk menampilkan halaman sukses/tanda terima
    public function showSuccessPage(Order $order)
    {
        // Pastikan pengguna hanya bisa melihat pesanannya sendiri
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        
        // Load relasi order_items dan product di dalamnya
        $order->load('orderItems.product');
        
        return view('pengguna.pesanan_sukses', compact('order'));
    }
}