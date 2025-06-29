<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mitra; // <-- TAMBAHKAN INI untuk mengakses model Mitra
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // <-- Tambahkan ini untuk konsistensi

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data untuk Pengguna Biasa
        User::create([
            'name' => 'Pengguna Pesenin',
            'email' => 'pengguna@gmail.com',
            'role' => 'pengguna',
            'password' => Hash::make('123456'),
        ]);

        // Data untuk Admin
        User::create([
            'name' => 'Admin Pesenin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);

        // --- DATA UNTUK MITRA (dengan profilnya) ---
        // 1. Buat data user-nya terlebih dahulu
        $mitraUser = User::create([
            'name' => 'Mitra Dapur Lezat',
            'email' => 'mitra@gmail.com',
            'role' => 'mitra',
            'password' => Hash::make('123456'),
        ]);

        // 2. Buat data profil mitra yang terhubung dengan user di atas
        $mitraUser->mitra()->create([
            'telepon'           => '081234567890',
            'nama_usaha'        => 'Dapur Lezat Bunda',
            'jenis_kuliner'     => 'Masakan Jawa & Sunda',
            'deskripsi'         => 'Menyediakan masakan rumahan otentik dengan resep warisan keluarga. Dijamin halal dan higienis.',
            'alamat_usaha'      => 'Jl. Pahlawan No. 123, Cileungsi, Bogor',
            // Biarkan foto kosong untuk data dummy, atau isi dengan path placeholder jika ada
            'paths_foto_masakan' => json_encode(['placeholder/menu1.jpg', 'placeholder/menu2.jpg']), 
            'status_verifikasi' => 'disetujui', // Langsung disetujui untuk testing
        ]);
    }
}