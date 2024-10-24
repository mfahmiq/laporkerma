<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Import kelas Auth

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah user terautentikasi
        if (!Auth::check()) {
            return redirect('/login'); // Redirect ke login jika belum terautentikasi
        }

        // Cek apakah role pengguna sesuai
        if (Auth::user()->role !== $role) {
            return redirect('/dashboard'); // Redirect jika role tidak sesuai
        }

        return $next($request); // Lanjutkan ke request berikutnya
    }
}
