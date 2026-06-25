<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kabs', function (Blueprint $table) {
            // Guna 'hasColumn' supaya Laravel semak dulu sebelum tambah kolum. Ini mengelakkan error duplicate!
            if (!Schema::hasColumn('kabs', 'kategori')) {
                $table->string('kategori')->default('tempat')->after('nama_kab'); 
            }
            
            if (!Schema::hasColumn('kabs', 'gambar')) {
                $table->string('gambar')->nullable()->after('kategori');
            }
        });
    }

    public function down(): void
    {
        Schema::table('kabs', function (Blueprint $table) {
            if (Schema::hasColumn('kabs', 'kategori')) {
                $table->dropColumn('kategori');
            }
            if (Schema::hasColumn('kabs', 'gambar')) {
                $table->dropColumn('gambar');
            }
        });
    }
};