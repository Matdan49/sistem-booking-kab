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
            
            // Hubungkan dengan table Kabs (Fasiliti). 
            // Pastikan table 'kabs' dicipta SEBELUM table 'bookings' ini dijalankan!
            $table->foreignId('kab_id')->constrained('kabs')->onDelete('cascade');
            
            // Maklumat masa tempahan
            $table->date('tarikh_guna'); 
            $table->time('masa_mula');   
            $table->time('masa_tamat');  
            
            // Maklumat tambahan untuk kelulusan kolej
            $table->string('tujuan_tempahan'); 
            $table->string('nama_persatuan_program')->nullable(); 
            
            /* Logik Status Kelulusan 2 Tahap:
              'pending'           = Baru hantar (Menunggu Pejabat)
              'disokong_pejabat'  = Pejabat lulus & sokong (Menunggu Pengetua)
              'lulus_muktamad'    = Pengetua lulus (Tempahan Berjaya)
              'ditolak_pejabat'   = Ditolak oleh Pejabat
              'ditolak_pengetua'  = Ditolak oleh Pengetua
            */
            $table->string('status_kelulusan')->default('pending'); 
            
            // Catatan berasingan mengikut tahap kelulusan
            $table->text('catatan_pejabat')->nullable(); 
            $table->text('catatan_pengetua')->nullable(); 
            
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