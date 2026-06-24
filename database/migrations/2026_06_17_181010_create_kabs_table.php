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
        $table->id(); // ID unik untuk setiap kabin (Auto-increment)
        $table->string('nama_kab'); // Contoh: Kabin Mawar, Kabin Tulip
        $table->string('no_kab')->unique(); // Contoh: K01, K02 (tidak boleh sama)
        $table->integer('kapasiti')->nullable(); // Contoh: 4 (muat 4 orang)
        $table->decimal('harga_per_malam', 8, 2); // Contoh: 150.00
        $table->string('status')->default('available'); // Status: available / booked / maintenance
        $table->text('deskripsi')->nullable(); // Keterangan kabin (boleh kosong)
        $table->string('kategori'); // MESTI ADA BARIS INI
        $table->string('gambar')->nullable(); // MESTI ADA BARIS INI
        $table->timestamps(); // Cipta kolum created_at & updated_at secara automatik
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
