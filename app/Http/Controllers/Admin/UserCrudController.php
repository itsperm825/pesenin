<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('pengguna', 'pengguna');

        // Hanya tampilkan user dengan peran 'pengguna'
        CRUD::addClause('where', 'role', '=', 'pengguna');
    }

    protected function setupListOperation()
    {
        CRUD::column('name')->label('Nama');
        CRUD::column('email')->label('Email');
        CRUD::column('created_at')->label('Tanggal Gabung');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        CRUD::field('name')->label('Nama');
        CRUD::field('email')->label('Email');
        CRUD::field('password')->label('Password');
        
        // Secara otomatis set peran ke 'pengguna' saat membuat user baru
        CRUD::field('role')->type('hidden')->value('pengguna');
    }

    protected function setupUpdateOperation()
    {
        // Validasi untuk update (email boleh sama untuk user ini)
        CRUD::setValidation([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email,' . CRUD::getCurrentEntryId(),
        ]);
        $this->setupCreateOperation();
    }
}