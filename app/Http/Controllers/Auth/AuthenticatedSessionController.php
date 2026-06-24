<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Validasi input dropdown role daripada borang login
        $request->validate([
            'role' => 'required|string|in:student,non-student,pejabat,pengetua',
        ]);

        // Proses pengesahan emel dan kata laluan asal Laravel Breeze
        $request->authenticate();

        // 2. Semak padanan peranan: Adakah role pilihan sepadan dengan database?
        if (Auth::user()->role !== $request->role) {
            
            // Jika salah pilih, log keluar pengguna serta-merta
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Hantar pengguna semula ke skrin login bersama mesej ralat merah
            return redirect()->route('login')->withErrors([
                'role' => 'Peranan yang dipilih tidak sepadan dengan akaun anda!'
            ])->withInput($request->only('email', 'remember'));
        }

        // 3. Sesi diperbaharui jika padanan peranan berjaya
        $request->session()->regenerate();

        // 4. Hantar ke dashboard (Paparan automatik berubah mengikut peranan hasil filter Blade)
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}