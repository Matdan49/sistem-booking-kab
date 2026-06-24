<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// 1. Laman utama terus tukar pergi ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 🚀 MOD TRIAL: Laluan Pintas Log Masuk Tanpa Password (WAJIB di luar auth middleware)
Route::get('/login/quick/{role}', [BookingController::class, 'quickLogin'])->name('login.quick');


// ======================================================================
// Semua fungsi yang memerlukan pengguna Log Masuk (Auth)
// ======================================================================
Route::middleware(['auth', 'verified'])->group(function () {

    // 2. Pusat Utama Dashboard (Panggil fungsi index untuk tapis paparan ikut Role)
    Route::get('/dashboard', [BookingController::class, 'index'])->name('dashboard');

    // ⚙️ LALUAN BARU: Halaman semak status permohonan pemohon (Khas untuk Student/Non-Student)
    Route::get('/bookings/status', [BookingController::class, 'status'])->name('bookings.status');

    // 3. Pengurusan Profil Pengguna (Bawaan Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 4. Pelajar hantar permohonan tempahan fasiliti
    Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
    
    // 5. TAHAP 1: Pihak Pejabat sahkan/sokong permohonan
    Route::post('/bookings/{id}/sahkan-pejabat', [BookingController::class, 'sahkanPejabat'])->name('bookings.sahkan.pejabat');
    
    // 6. TAHAP 2: Pengetua luluskan secara muktamad
    Route::post('/bookings/{id}/lulus-pengetua', [BookingController::class, 'lulusPengetua'])->name('bookings.lulus.pengetua');
    
    // 7. Proses Tolak Permohonan (Ditukar ke 'tolak' sepadan dengan nama fungsi dalam BookingController)
    Route::post('/bookings/{id}/tolak', [BookingController::class, 'tolak'])->name('bookings.tolak');
});

require __DIR__.'/auth.php';