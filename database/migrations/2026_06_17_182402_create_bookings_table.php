<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        
        // Hubungkan dengan table Users (Siapa yang tempah - Pelajar/Staf)
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
        // Hubungkan dengan table Kabs (Fasiliti mana yang ditempah)
        $table->foreignId('kab_id')->constrained('kabs')->onDelete('cascade');
        
        // Maklumat masa tempahan
        $table->date('tarikh_guna'); // Tarikh fasiliti digunakan
        $table->time('masa_mula');   // Contoh: 08:00 AM
        $table->time('masa_tamat');  // Contoh: 11:00 AM
        
        // Maklumat tambahan untuk kelulusan kolej
        $table->string('tujuan_tempahan'); // Contoh: Mesyuarat Persidangan Pelajar
        $table->string('nama_persatuan_program')->nullable(); // Contoh: MPMKAB / JKM
        $table->string('status_kelulusan')->default('pending'); // pending / approved / rejected
        $table->text('catatan_admin')->nullable(); // Sebab lulus atau gagal
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
