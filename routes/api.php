<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ======================================================================
// 📱 API 1: LOG MASUK PELAJAR
// ======================================================================
Route::post('/login-mobile', function (Request $request) {
    $user = DB::table('users')->where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => 401,
            'mesej' => 'Emel atau kata laluan salah!'
        ], 401);
    }

    return response()->json([
        'status' => 200,
        'mesej' => 'Berjaya log masuk!',
        'user' => $user
    ]);
});

// ======================================================================
// 📱 API 2: SENARAI FASILITI (KABS)
// ======================================================================
Route::get('/fasiliti-mobile', function () {
    $senaraiFasiliti = DB::table('kabs')->get();

    return response()->json([
        'status' => 200,
        'data' => $senaraiFasiliti
    ]);
});
// ======================================================================
// 📱 API 3: HANTAR TEMPAHAN BARU (Mobile App)
// ======================================================================
Route::post('/hantar-tempahan-mobile', function (Request $request) {
    
    // Simpan data tempahan ke dalam jadual bookings
    DB::table('bookings')->insert([
        'user_id' => $request->user_id,
        'kab_id' => $request->kab_id,
        'tarikh_guna' => $request->tarikh_guna,
        'masa_mula' => $request->masa_mula,
        'masa_tamat' => $request->masa_tamat,
        'tujuan_tempahan' => $request->tujuan_tempahan,
        'kategori_pemohon' => 'Pelajar', // Tetapan asas untuk aplikasi pelajar
        'status_kelulusan' => 'Menunggu', // Status awal permohonan
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json([
        'status' => 200,
        'mesej' => 'Permohonan tempahan berjaya dihantar!'
    ]);
});