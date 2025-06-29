<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Mitra;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KemitraanController extends Controller
{
    /**
     * Menampilkan halaman informasi kemitraan.
     */
    public function showKemitraan()
    {
        // UBAH BARIS INI: dari 'kemitraan' menjadi 'home.kemitraan'
        return view('home.kemitraan');
    }

    /**
     * Menampilkan halaman formulir pendaftaran mitra.
     */
    public function showDaftarKemitraanForm()
    {
        // UBAH BARIS INI: dari 'daftar-kemitraan' menjadi 'home.daftar-kemitraan'
        return view('home.daftar-kemitraan');
    }

    /**
     * Menyimpan dan memvalidasi data pendaftaran mitra dari formulir.
     */

// app/Http/Controllers/KemitraanController.php

public function storeKemitraan(Request $request)
{
    // 1. Validasi data yang masuk dari form
    $request->validate([
        'nama_pemilik'      => 'required|string|max:255',
        'telepon'           => 'required|string|max:15',
        'email'             => 'required|email|max:255|unique:users,email',
        'password'          => 'required|string|min:8|confirmed', // Tambahkan validasi password
        'nama_usaha'        => 'required|string|max:255',
        'jenis_kuliner'     => 'required|string|max:255',
        'deskripsi'         => 'required|string',
        'alamat_usaha'      => 'required|string',
        'foto_masakan.*'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'agreement'         => 'accepted',
    ]);

    // DB Transaction untuk memastikan semua data berhasil disimpan atau tidak sama sekali
    DB::beginTransaction();
    try {
        // 2. Simpan foto-foto masakan (jika ada)
        $pathsFotoMasakan = [];
        if ($request->hasFile('foto_masakan')) {
            foreach ($request->file('foto_masakan') as $file) {
                // Simpan file ke storage/app/public/foto_masakan
                $pathsFotoMasakan[] = $file->store('foto_masakan', 'public');
            }
        }

        // 3. Buat data user baru di tabel 'users'
        $user = User::create([
            'name' => $request->nama_pemilik,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Ambil password dari inputan
            'role' => 'mitra',
        ]);

        // 4. Buat data profil mitra di tabel 'mitra'
        $user->mitra()->create([
            'telepon'           => $request->telepon,
            'nama_usaha'        => $request->nama_usaha,
            'jenis_kuliner'     => $request->jenis_kuliner,
            'deskripsi'         => $request->deskripsi,
            'alamat_usaha'      => $request->alamat_usaha,
            'paths_foto_masakan' => json_encode($pathsFotoMasakan), // Simpan array path sebagai teks JSON
        ]);

        // 5. Jika semua proses berhasil, commit transaksi
        DB::commit();

        // 6. Redirect kembali ke halaman form dengan pesan sukses untuk memicu pop-up
        return back()->with('success', 'Pendaftaran Berhasil!');

    } catch (\Exception $e) {
        // Jika terjadi error di tengah jalan, batalkan semua query yang sudah dijalankan
        DB::rollBack();

        // Catat error untuk debugging
        // Log::error($e->getMessage());
        
        // Redirect kembali dengan pesan error
        return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.')->withInput();
    }
}
}