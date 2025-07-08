<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Mitra;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use illuminate\Container\Attributes\Auth as AuthAttribute; // Perbaiki penamaan namespace


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

public function store(Request $request)
    {
                // 1. Validasi semua data dari form
                $validatedData = $request->validate([
            // ... aturan validasi lain untuk nama, email, password, dll. ...
            'nama_pemilik' => 'required|string|max:100',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'nama_usaha' => 'required|string|max:100',
            'jenis_kuliner' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'alamat_usaha' => 'required|string',

            // --- PERUBAHAN UTAMA DI SINI ---
            'foto_masakan' => ['nullable', 'array', 'max:3'], // 'max:3' untuk membatasi maksimal 3 file
            'foto_masakan.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // 'max:2048' untuk 2MB per foto
            // ------------------------------------
            
            'agreement' => 'required',
        ]);

        // 2. Gunakan Transaction untuk keamanan data
        $user = null;
        DB::transaction(function () use (&$user, $validatedData, $request) {
            
            // 3. BUAT USER BARU DI TABEL 'users'
            $user = User::create([
                'name' => $validatedData['nama_pemilik'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => 'mitra', // Otomatis set peran sebagai 'mitra'
            ]);
            $user->assignRole('mitra');

            // 4. Proses foto
            $fotoPaths = [];
            if ($request->hasFile('foto_masakan')) {
                foreach ($request->file('foto_masakan') as $file) {
                    $path = $file->store('mitra-photos', 'public');
                    $fotoPaths[] = $path;
                }
            }

            // 5. BUAT PROFIL MITRA BARU DI TABEL 'mitra'
            Mitra::create([
                'user_id' => $user->id, // Terhubung ke user yang baru dibuat
                'telepon' => $validatedData['telepon'],
                'nama_usaha' => $validatedData['nama_usaha'],
                'jenis_kuliner' => $validatedData['jenis_kuliner'],
                'deskripsi' => $validatedData['deskripsi'],
                'alamat_usaha' => $validatedData['alamat_usaha'],
                'paths_foto_masakan' => $fotoPaths,
            ]);
        });
        Auth::login($user);

        // 6. Alihkan ke halaman login DENGAN PESAN SUKSES
        return redirect()->route('login')->with('success', 'Pendaftaran Mitra Berhasil! Silakan login untuk melanjutkan.');
    }
}