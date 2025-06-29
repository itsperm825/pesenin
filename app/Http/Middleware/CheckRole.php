<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate; // <-- TAMBAHKAN INI

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            abort(403, 'AKSES DITOLAK: ANDA HARUS LOGIN.');
        }

        // Cek apakah user diizinkan melewati gerbang yang sesuai dengan rolenya
        // Contoh: jika route memakai role:mitra, maka akan dicek Gate::allows('isMitra')
        // if (!Gate::allows('is'.ucfirst($role))) {
        //     abort(403, 'AKSES DITOLAK: ANDA TIDAK MEMILIKI HAK AKSES UNTUK HALAMAN INI.');
        // }

        return $next($request);
    }
}