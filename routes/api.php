<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VoucherController; // <-- Pastikan import ini ada

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Rute ini akan memeriksa validitas kode voucher.
// Middleware 'auth:sanctum' memastikan hanya user yang sudah login yang bisa mengaksesnya.
// Lindungi rute ini dengan middleware 'auth:sanctum'

Route::middleware('auth:sanctum')->post('/vouchers/check', [VoucherController::class, 'check']);

Route::post('/vouchers/check', [VoucherController::class, 'check']);
 
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
})->middleware('auth:sanctum'); 
