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
    public function handle($request, Closure $next, string $role): Response
    {
        // Cek apakah user sudah login
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        return redirect('/login')->withErrors('Tidak memiliki akses.');
    }
}