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

    // 🌿 LALUAN BARU: Sistem Menu Bercabang & Galeri (Peralatan vs Tempat)
    Route::get('/fasiliti', function () { return view('menu-fasiliti'); })->name('fasiliti.menu');
    Route::get('/fasiliti/tempat', function () { return view('menu-tempat'); })->name('fasiliti.tempat');
    Route::get('/fasiliti/peralatan', function () { return view('menu-peralatan'); })->name('fasiliti.peralatan');

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

    // 8. Cetak Surat Kelulusan Format PDF
    Route::get('/bookings/{id}/pdf', [BookingController::class, 'downloadPDF'])->name('bookings.pdf');

    // 🏛️ PENGURUSAN FASILITI (CRUD & UPLOAD GAMBAR - KHAS ADMIN/PEJABAT)
    Route::get('/admin/fasiliti', [BookingController::class, 'adminFasilitiIndex'])->name('admin.fasiliti.index');
    Route::post('/admin/fasiliti/store', [BookingController::class, 'adminFasilitiStore'])->name('admin.fasiliti.store');
    Route::post('/admin/fasiliti/{id}/update', [BookingController::class, 'adminFasilitiUpdate'])->name('admin.fasiliti.update');
    Route::delete('/admin/fasiliti/{id}/delete', [BookingController::class, 'adminFasilitiDelete'])->name('admin.fasiliti.delete');
});

require __DIR__.'/auth.php';