<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class MitraCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // Kita nonaktifkan Create & Update dari admin panel karena pendaftaran via form publik

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class); // Model utama tetap User
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mitra');
        CRUD::setEntityNameStrings('mitra', 'mitra');
        
        // Hanya tampilkan user dengan peran 'mitra'
        CRUD::addClause('where', 'role', '=', 'mitra');
        // Sertakan data dari relasi 'mitra' (profil usaha)
        CRUD::with('mitra'); 
    }

    protected function setupListOperation()
    {
        CRUD::column('name')->label('Nama Pemilik');
        CRUD::column('email')->label('Email');

        // Menampilkan kolom dari tabel relasi
        CRUD::column([
            'label' => 'Nama Usaha',
            'name' => 'mitra.nama_usaha', // Gunakan notasi titik
        ]);
        CRUD::column([
            'label' => 'Status Verifikasi',
            'name' => 'mitra.status_verifikasi',
        ]);
        
        // Nanti kita bisa tambahkan tombol untuk verifikasi di sini
    }
}