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
        Schema::table('bookings', function (Blueprint $table) {
            // 1. Tambah kategori pemohon (Individu atau Persatuan)
            $table->string('kategori_pemohon')->default('Individu')->after('kab_id');

            // 2. Tambah kolum sebab penolakan jika permohonan gagal
            $table->text('sebab_ditolak')->nullable()->after('status_kelulusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Padam semula kolum-kolum ini jika kita rollback
            $table->dropColumn(['kategori_pemohon', 'sebab_ditolak']);
        });
    }
};