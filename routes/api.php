<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // <--- Wajib ada supaya fungsi DB::table berfungsi
use App\Http\Controllers\Api\AuthController;

// ======================================================================
// 📱 API 1: LOG MASUK (Dah Berjaya!)
// ======================================================================
Route::post('/login-mobile', [AuthController::class, 'login']);

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
// 📱 API 3: HANTAR TEMPAHAN BARU (Mobile App) - TELAH DISELARASKAN
// ======================================================================
Route::post('/hantar-tempahan-mobile', function (Request $request) {
    
    // Semak jika slot dah ditempah orang lain (Validasi Asas)
    $wujud = DB::table('bookings')
        ->where('kab_id', $request->kab_id)
        ->where('status_kelulusan', '!=', 'ditolak_pejabat')
        ->where('status_kelulusan', '!=', 'ditolak_pengetua')
        ->where(function ($query) use ($request) {
            $query->whereBetween('tarikh_mula', [$request->tarikh_mula, $request->tarikh_tamat])
                  ->orWhereBetween('tarikh_tamat', [$request->tarikh_mula, $request->tarikh_tamat]);
        })->exists();

    if ($wujud) {
        return response()->json([
            'status' => 409,
            'mesej' => 'Slot Bertindih! Tarikh ini telah ditempah oleh pihak lain.'
        ]);
    }

    // Simpan jika tiada pertindihan
    DB::table('bookings')->insert([
        'user_id'          => $request->user_id,
        'kab_id'           => $request->kab_id,
        'tarikh_mula'      => $request->tarikh_mula, 
        'tarikh_tamat'     => $request->tarikh_tamat, 
        'masa_mula'        => $request->masa_mula,
        'masa_tamat'       => $request->masa_tamat,
        'tujuan_tempahan'  => $request->tujuan_tempahan,
        'kategori_pemohon' => 'Pelajar', 
        'jumlah_bayaran'   => 0.00, 
        'status_kelulusan' => 'pending', 
        'created_at'       => now(),
        'updated_at'       => now(),
    ]);

    return response()->json([
        'status' => 200,
        'mesej' => 'Permohonan tempahan berjaya dihantar!'
    ]);
});

// ======================================================================
// 📱 API 4: SEJARAH TEMPAHAN PELAJAR (Mobile App) - DIKEMAS KINI
// ======================================================================
Route::post('/sejarah-mobile', function (Request $request) {
    
    // Pastikan user_id dihantar dari aplikasi Flutter
    if (!$request->has('user_id')) {
        return response()->json([
            'status' => 400,
            'mesej' => 'ID Pengguna diperlukan'
        ]);
    }

    // Tarik data tempahan, pastikan HANYA tarik yang TIDAK disembunyikan (hidden_by_user = 0)
    $sejarah = DB::table('bookings')
        ->leftJoin('kabs', 'bookings.kab_id', '=', 'kabs.id')
        ->select('bookings.*', 'kabs.nama_kab', 'kabs.no_kab')
        ->where('bookings.user_id', $request->user_id)
        ->where(function($query) {
            $query->where('bookings.hidden_by_user', 0)
                  ->orWhereNull('bookings.hidden_by_user'); // Elak error pada data lama
        })
        ->orderBy('bookings.id', 'desc') 
        ->get();

    return response()->json([
        'status' => 200,
        'data' => $sejarah
    ]);
});

// ======================================================================
// 📱 API 5: BATAL TEMPAHAN (Mobile App)
// ======================================================================
Route::post('/batal-tempahan-mobile', function (Request $request) {
    if (!$request->has('booking_id')) {
        return response()->json([
            'status' => 400,
            'mesej' => 'ID Tempahan diperlukan'
        ]);
    }

    $dipadam = DB::table('bookings')->where('id', $request->booking_id)->delete();

    if ($dipadam) {
        return response()->json([
            'status' => 200,
            'mesej' => 'Tempahan berjaya dibatalkan dan dipadam dari rekod.'
        ]);
    } else {
        return response()->json([
            'status' => 500,
            'mesej' => 'Gagal membatalkan tempahan. Sila cuba lagi.'
        ]);
    }
});

// ======================================================================
// 📱 API 6: CLEAR HISTORY (Sembunyi rekod lama dari App)
// ======================================================================
Route::post('/clear-sejarah-mobile', function (Request $request) {
    
    // HANYA sembunyikan tempahan yang LULUS MUKTAMAD atau DITOLAK sahaja
    $update = DB::table('bookings')
        ->where('user_id', $request->user_id)
        ->whereIn('status_kelulusan', ['lulus_muktamad', 'ditolak_pejabat', 'ditolak_pengetua'])
        ->update(['hidden_by_user' => 1]);

    return response()->json([
        'status' => 200,
        'mesej' => 'Sejarah lama berjaya dibersihkan. (Menunggu & Disokong dikekalkan).'
    ]);
});