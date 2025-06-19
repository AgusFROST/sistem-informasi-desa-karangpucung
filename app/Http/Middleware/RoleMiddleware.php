<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, $role): Response
    // {
    //     if (!Auth::check() || Auth::user()->role->name !== $role) {
    //         abort(403); // Menolak akses jika role tidak sesuai
    //     }
    //     return $next($request);
    // }

    public function handle($request, Closure $next, ...$roles)
    {
        $userRole = auth()->user()->role->name; // Mengambil nama role pengguna yang login

        // Memeriksa apakah peran pengguna ada dalam daftar peran yang diizinkan
        if (!in_array($userRole, $roles)) {
            return abort(403, 'Unauthorized'); // Akses ditolak jika tidak sesuai peran
        }

        return $next($request);
    }
}
