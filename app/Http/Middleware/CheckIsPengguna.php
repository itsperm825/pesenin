<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckIsPengguna {
    public function handle(Request $request, Closure $next) {
        if (!Auth::check() || Auth::user()->role !== 'pengguna') {
            abort(403, 'AKSES INI HANYA UNTUK PENGGUNA.');
        }
        return $next($request);
    }
}