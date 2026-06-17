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
        Schema::table('kabs', function (Blueprint $table) {
            // Tambah kolum gambar
            $table->string('gambar_fasiliti')->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kabs', function (Blueprint $table) {
            // Padam semula kolum gambar jika rollback
            $table->dropColumn('gambar_fasiliti');
        });
    }
};