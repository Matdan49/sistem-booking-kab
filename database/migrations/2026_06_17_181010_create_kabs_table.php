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
    Schema::create('kabs', function (Blueprint $table) {
        $table->id(); 
        $table->string('nama_kab'); // Contoh: Dewan Utama, Gelanggang Serbaguna
        $table->string('no_kab')->unique()->nullable(); // Ditukar ke nullable jika ada fasiliti tiada nombor kod
        $table->integer('kapasiti')->nullable(); 
        $table->decimal('harga_per_malam', 8, 2)->default(0.00); // Letak default supaya tidak ralat jika percuma
        $table->string('status')->default('available'); // available / booked / maintenance
        $table->text('deskripsi')->nullable(); 
        $table->string('kategori')->default('tempat'); // tempat / peralatan
        $table->string('gambar')->nullable(); // KEKALKAN SATU NAMA INI SAHAJA
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabs');
    }
};
