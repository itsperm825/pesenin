<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin'),
        ['is-admin'] // <-- PASTIKAN PENJAGA ADMIN KITA ADA DI SINI
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { 
    // Rute CRUD hanya untuk Admin
    Route::crud('user', 'UserCrudController');
    Route::crud('mitra', 'MitraCrudController');
});
