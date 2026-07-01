<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Pastikan pengguna dah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Semak adakah role pengguna wujud dalam senarai role yang dibenarkan
        if (!in_array(Auth::user()->role, $roles)) {
            // Jika kantoi menceroboh, tendang balik ke dashboard dengan mesej amaran
            return redirect()->route('dashboard')->with('error', '🚨 Akses Ditolak: Anda tiada kebenaran untuk halaman ini!');
        }

        // 3. Jika lulus, benarkan akses
        return $next($request);
    }
}