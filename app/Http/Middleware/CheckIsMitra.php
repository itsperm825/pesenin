<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckIsMitra {
    public function handle(Request $request, Closure $next) {
        if (!Auth::check() || Auth::user()->role !== 'mitra') {
            abort(403, 'AKSES INI HANYA UNTUK MITRA.');
        }
        return $next($request);
    }
}