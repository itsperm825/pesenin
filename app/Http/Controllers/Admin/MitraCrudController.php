<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MitraRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class MitraCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
    // Tambahkan baris ini untuk debugging
    dd(\App\Models\Mitra::all());

    CRUD::setModel(\App\Models\Mitra::class);
    CRUD::setRoute(config('backpack.base.route_prefix') . '/mitra');
    CRUD::setEntityNameStrings('mitra', 'mitra');

    }

    
    /**
     * Mendefinisikan kolom yang akan tampil di tabel (List View).
     */
    protected function setupListOperation()
{
    CRUD::column('user.name')->label('Nama Pemilik');
    CRUD::column('nama_usaha')->label('Nama Usaha');
    CRUD::column('telepon')->label('No. Telepon');
    CRUD::column('jenis_kuliner')->label('Jenis Kuliner');
    CRUD::column('alamat_usaha')->label('Alamat')->limit(40);
    
    // --- KODE BARU YANG SUDAH DIPERBAIKI (MENGGUNAKAN TYPE CLOSURE) ---
    CRUD::column('status_verifikasi')->label('Status')->type('closure')->function(function($entry) {
        if ($entry->status_verifikasi == 'disetujui') {
            return '<span class="badge bg-success">Disetujui</span>';
        }
        if ($entry->status_verifikasi == 'ditolak') {
            return '<span class="badge bg-danger">Ditolak</span>';
        }
        return '<span class="badge bg-warning">Pending</span>';
    });
    // --- BATAS PERBAIKAN ---

    CRUD::column('fotoMasakanHtml')
        ->label('Foto Masakan')
        ->type('model_function')
        ->functionName('getFotoMasakanHtmlAttribute')
        ->escaped(false);
    
    CRUD::column('created_at')->label('Tanggal Daftar');
}

   /**
     * Mendefinisikan field yang akan tampil di form Create dan Update.
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MitraRequest::class);

        // Field untuk memilih user yang akan dijadikan mitra
        CRUD::field('user_id')->label('User Pemilik')->type('select2')->entity('user')->attribute('name')->model('App\Models\User');
        
        CRUD::field('nama_usaha')->label('Nama Usaha');
        CRUD::field('telepon')->label('No. Telepon');
        CRUD::field('jenis_kuliner')->label('Jenis Kuliner');
        CRUD::field('deskripsi')->label('Deskripsi Usaha')->type('textarea');
        CRUD::field('alamat_usaha')->label('Alamat Usaha')->type('textarea');
        
        // Field untuk mengubah status verifikasi
        CRUD::field('status_verifikasi')->label('Status Verifikasi')->type('enum')->options(['pending', 'disetujui', 'ditolak']);
    }

protected function setupUpdateOperation()
{
    // Panggil field dari setupCreateOperation
    $this->setupCreateOperation(); 
    
    // Atau definisikan field khusus untuk update
    // CRUD::setValidation(MitraRequest::class); // Jika validasinya berbeda

    // Field ini akan muncul sebagai dropdown di form Edit
    CRUD::field('status_verifikasi')
        ->label('Status Verifikasi')
        ->type('select_from_array')
        ->options([
            'pending' => 'Pending',
            'disetujui' => 'Disetujui',
            'ditolak' => 'Ditolak'
        ])
        ->allows_null(false)
        ->default('pending')
        ->wrapper(['class' => 'form-group col-md-6']) // Atur layout agar rapi
        ->help('Ubah status mitra. Jika disetujui, mitra bisa mulai berjualan.');
}
}