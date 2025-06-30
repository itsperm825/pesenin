<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Product; // Import model Product yang sudah kita buat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import class Auth untuk mendapatkan data user yang login
use Illuminate\Support\Facades\Storage; // Import Storage untuk mengelola file gambar

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk yang HANYA dimiliki oleh Mitra yang sedang login.
     */
    public function index()
    {
        // 1. Ambil ID user (mitra) yang sedang login
        $mitraId = auth()->id();

        // 2. Ambil semua produk dari database DI MANA 'user_id' sama dengan ID mitra yang login
        //    - latest() untuk mengurutkan dari yang terbaru
        //    - paginate(10) untuk membatasi 10 produk per halaman (baik untuk performa)
        $produks = Product::where('user_id', $mitraId)->latest()->paginate(10);

        // 3. Tampilkan view 'index' dan kirim data produk ke dalamnya
        return view('mitra.produk.index', compact('produks'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        // Tugas method ini hanya menampilkan halaman form
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

        // 2. Siapkan data untuk disimpan
        $data = $request->all();

        // 3. Set user_id dengan ID mitra yang sedang login. INI PENTING UNTUK KEPEMILIKAN
        $data['user_id'] = auth()->id();

        // 4. Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar-produk', 'public');
        }

        // 5. Simpan data ke tabel 'products'
        Product::create($data);

        // 6. Alihkan kembali ke halaman daftar produk dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit produk yang sudah ada.
     * Laravel secara otomatis akan mencari produk berdasarkan ID di URL (Route Model Binding).
     */
    public function edit(Product $produk)
    {
        // PENTING: Pengecekan otorisasi untuk memastikan mitra hanya bisa mengedit produknya sendiri
        if ($produk->user_id !== auth()->id()) {
            abort(403, 'AKSES DITOLAK. ANDA BUKAN PEMILIK PRODUK INI.');
        }
        
        // Tampilkan view 'edit' dan kirim data produk yang ingin diedit
        return view('mitra.produk.edit', compact('produk'));
    }

    /**
     * Mengupdate data produk yang sudah ada di database.
     */
    public function update(Request $request, Product $produk)
    {
        // Pengecekan otorisasi
        if ($produk->user_id !== auth()->id()) {
            abort(403, 'AKSES DITOLAK.');
        }

        // Validasi data (mirip seperti store)
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file gambar baru yang di-upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama untuk menghemat space
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            // Simpan gambar baru dan update path-nya
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-produk', 'public');
        }

        // Update data produk di database
        $produk->update($validatedData);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $produk)
    {
        // Pengecekan otorisasi
        if ($produk->user_id !== auth()->id()) {
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