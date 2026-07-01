<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// Laman utama terus tukar pergi ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 🚀 MOD TRIAL: Laluan Pintas Log Masuk Tanpa Password (Di luar auth)
Route::get('/login/quick/{role}', [BookingController::class, 'quickLogin'])->name('login.quick');

// ======================================================================
// SEMUA FUNGSI YANG MEMERLUKAN PENGGUNA LOG MASUK
// ======================================================================
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [BookingController::class, 'index'])->name('dashboard');

    // Pengurusan Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ======================================================================
    // 🌿 LALUAN KLIEN (AKSES UMUM UNTUK SEMUA ROLE YANG LOG MASUK)
    // ======================================================================
    Route::get('/fasiliti', function () { 
        return view('menu-fasiliti'); 
    })->name('fasiliti.menu');

    Route::get('/fasiliti/tempat', function () { 
        // Tarik data dari database yang kategorinya 'tempat'
        $senarai_tempat = \App\Models\Kab::where('kategori', 'tempat')->get();
        return view('menu-tempat', compact('senarai_tempat')); 
    })->name('fasiliti.tempat');

    Route::get('/fasiliti/peralatan', function () { 
        // Tarik data dari database yang kategorinya 'peralatan'
        $senarai_peralatan = \App\Models\Kab::where('kategori', 'peralatan')->get();
        return view('menu-peralatan', compact('senarai_peralatan')); 
    })->name('fasiliti.peralatan');

    // 👇 INI ADALAH 4 BARIS YANG HILANG SEBELUM INI
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/status', [BookingController::class, 'status'])->name('bookings.status');
    Route::get('/bookings/{id}/pdf', [BookingController::class, 'downloadPDF'])->name('bookings.pdf');

    // ======================================================================
    // 🏛️ LALUAN ADMIN (KHAS UNTUK PEJABAT & PENGETUA SAHAJA)
    // ======================================================================
    Route::middleware(['role:pejabat,pengetua'])->group(function () {
        
        // Tindakan Kelulusan
        Route::post('/bookings/{id}/sahkan-pejabat', [BookingController::class, 'sahkanPejabat'])->name('bookings.sahkan.pejabat');
        Route::post('/bookings/{id}/lulus-pengetua', [BookingController::class, 'lulusPengetua'])->name('bookings.lulus.pengetua');
        Route::post('/bookings/{id}/tolak', [BookingController::class, 'tolak'])->name('bookings.tolak');

        // Pengurusan CRUD Fasiliti
        Route::get('/admin/fasiliti', [BookingController::class, 'adminFasilitiIndex'])->name('admin.fasiliti.index');
        Route::post('/admin/fasiliti/store', [BookingController::class, 'adminFasilitiStore'])->name('admin.fasiliti.store');
        Route::post('/admin/fasiliti/{id}/update', [BookingController::class, 'adminFasilitiUpdate'])->name('admin.fasiliti.update');
        Route::delete('/admin/fasiliti/{id}/delete', [BookingController::class, 'adminFasilitiDelete'])->name('admin.fasiliti.delete');

        // Tambah laluan untuk buka borang edit
        Route::get('/admin/fasiliti/{id}/edit', [BookingController::class, 'adminFasilitiEdit'])->name('admin.fasiliti.edit');
        Route::put('/admin/fasiliti/{id}/update', [BookingController::class, 'adminFasilitiUpdate'])->name('admin.fasiliti.update');
        
    });

});

require __DIR__.'/auth.php';