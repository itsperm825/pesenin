<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    protected function setupListOperation()
    {
        CRUD::column('name')->label('Nama');
        CRUD::column('email')->label('Email');
        CRUD::column('role')->label('Role')->wrapper(function ($entry) {
            if ($entry->role == 'admin') return '<span class="badge bg-primary">Admin</span>';
            if ($entry->role == 'mitra') return '<span class="badge bg-info text-dark">Mitra</span>';
            return '<span class="badge bg-secondary">Pengguna</span>';
        });
        CRUD::column('email_verified_at')->label('Terverifikasi')->type('check');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);
        CRUD::field('name')->label('Nama Lengkap');
        CRUD::field('email')->label('Alamat Email');
        CRUD::field('password')->label('Password')->type('password');
        CRUD::field('role')->label('Role')->type('select_from_array')->options([
            'pengguna' => 'Pengguna (Pembeli)',
            'mitra' => 'Mitra (Penjual)',
            'admin' => 'Admin'
        ])->allows_null(false)->default('pengguna');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation(); // Gunakan field yang sama, tapi password tidak required
        CRUD::field('password')->label('Password Baru')->type('password')->nullable();
    }
}