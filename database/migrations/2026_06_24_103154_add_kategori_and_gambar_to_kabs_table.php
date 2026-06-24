<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kabs', function (Blueprint $table) {
            // Tambah kolum kategori dan gambar dengan betul selepas nama_kab
            $table->string('kategori')->default('tempat')->after('nama_kab'); 
            $table->string('gambar')->nullable()->after('kategori');
        });
    }

    public function down(): void
    {
        Schema::table('kabs', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'gambar']);
        });
    }
};