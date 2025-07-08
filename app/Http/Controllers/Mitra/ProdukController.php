<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Product; // Import model Product yang sudah kita buat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import class Auth untuk mendapatkan data user yang login
use Illuminate\Support\Facades\Storage; // Import Storage untuk mengelola file gambar
use Barryvdh\DomPDF\Facade\Pdf; // Import PDF facade untuk membuat PDF

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk yang HANYA dimiliki oleh Mitra yang sedang login.
     */
    public function index()
    {
        $produks = Product::where('user_id', Auth::id())->latest()->paginate(10);
        return view('mitra.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('mitra.produk.create');
    }

    /**
     * Menyimpan produk baru yang dikirim dari form ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk dari form
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar boleh kosong, tapi jika ada harus berupa file gambar
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        // PASTIKAN BLOK INI ADA DAN BENAR
        if ($request->hasFile('gambar')) {
            // 'gambar-produk' adalah nama folder di dalam storage/app/public
            // 'public' berarti file ini bisa diakses secara publik
            $path = $request->file('gambar')->store('gambar-produk', 'public');
            $data['gambar'] = $path; // Simpan path ke dalam array data
        }

        Product::create($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit produk yang sudah ada.
     * Laravel secara otomatis akan mencari produk berdasarkan ID di URL (Route Model Binding).
     */
     public function edit(Product $produk)
    {
        // Otorisasi: Pastikan mitra hanya bisa edit produknya sendiri
        if ($produk->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }
        
        // Tampilkan view 'edit' dan kirim data produk yang ingin diedit
        return view('mitra.produk.edit', compact('produk'));
    }

    /**
     * Mengupdate data produk yang sudah ada di database.
     */
    public function update(Request $request, Product $produk)
    {
        // Otorisasi: Pastikan mitra hanya bisa update produknya sendiri
        if ($produk->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK');
        }

        // Validasi data (mirip seperti store, tapi password gambar tidak wajib)
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Logika untuk update gambar jika ada gambar baru yang di-upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada untuk menghemat storage
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            // Simpan gambar baru dan update path-nya
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-produk', 'public');
        }

        // Update data produk di database
        $produk->update($validatedData);

        // Alihkan kembali ke halaman daftar produk dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }


        public function cetak()
        {
            // KITA KEMBALI GUNAKAN CARA INI YANG LEBIH PASTI
            // Ambil semua produk yang user_id-nya cocok dengan ID user yang login
            $produks = Product::where('user_id', Auth::id())->get();
            
            $mitra = Auth::user(); 

            $data = [
                'tanggal' => date('d/m/Y'),
                'produks' => $produks,
                'mitra' => $mitra
            ];
            
            // Kirim data ke view
            return view('mitra.produk.cetak-pdf', $data);
        }

        public function show(Product $produk)
    {
        return redirect()->route('mitra.produk.edit', $produk->id);
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $produk)
    {
        // Pengecekan otorisasi
        if ($produk->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK.');
        }

        // Hapus file gambar terkait dari storage
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        // Hapus data produk dari database
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}