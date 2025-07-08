<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $mitraId = Auth::id();

        // Ambil ID produk milik mitra
        $productIds = Auth::user()->products()->pluck('id');

        // Tentukan rentang tanggal
        $startDate = $request->input('start_date') ? Carbon::parse($request->input('start_date'))->startOfDay() : now()->startOfMonth();
        $endDate = $request->input('end_date') ? Carbon::parse($request->input('end_date'))->endOfDay() : now()->endOfDay();

        // Query dasar untuk item pesanan milik mitra dalam rentang tanggal
        $query = OrderItem::whereIn('product_id', $productIds)
                            ->whereHas('order', function ($q) use ($startDate, $endDate) {
                                $q->whereBetween('created_at', [$startDate, $endDate]);
                            });

        // Kalkulasi metrik
        $pendapatanKotor = $query->clone()->sum(DB::raw('harga * jumlah'));
        $produkTerjual = $query->clone()->sum('jumlah');
        $jumlahPesanan = $query->clone()->distinct('order_id')->count('order_id');

        // Ambil daftar transaksi untuk ditampilkan di tabel
        $transaksi = $query->clone()->with(['order.user', 'product'])->latest()->paginate(15);

        return view('mitra.laporan.index', compact(
            'pendapatanKotor',
            'produkTerjual',
            'jumlahPesanan',
            'transaksi',
            'startDate',
            'endDate'
        ));
    }
}