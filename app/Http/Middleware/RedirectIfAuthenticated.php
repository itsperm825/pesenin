<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                if ($user->role == 'admin') {
                    // Jika admin sudah login dan mencoba akses /login, arahkan ke dasbor Backpack
                    return redirect(backpack_url('dashboard'));
                }
                elseif ($user->role == 'mitra') {
                    return redirect()->route('mitra.dashboard');
                }
                return redirect()->route('home'); // Pengguna biasa akan diarahkan ke home
            }
            
        }

        return $next($request);
    }
}