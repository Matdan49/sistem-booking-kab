<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Semak format yang dihantar oleh aplikasi Flutter
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Cuba log masuk menggunakan data dari MySQL
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            $user = Auth::user();
            /** @var \App\Models\User $user */ // <--- TAMBAH BARIS INI
            $user = Auth::user();
            // 3. Hasilkan Token Rahsia untuk peranti pintar
            $token = $user->createToken('myKAB-MobileApp')->plainTextToken;

            // 4. Pulangkan jawapan dalam format JSON yang kemas
            return response()->json([
                'status' => 'success',
                'message' => 'Log masuk berjaya!',
                'token' => $token,
                'user' => $user
            ], 200);
        }

        // 5. Jika salah kata laluan atau emel
        return response()->json([
            'status' => 'error',
            'message' => 'Emel atau kata laluan tidak sah. Sila cuba lagi.'
        ], 401);
    }
}