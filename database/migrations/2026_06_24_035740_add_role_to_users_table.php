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
        Schema::table('users', function (Blueprint $table) {
            // Menambah peranan pengguna: pelajar, pejabat, pengetua
            // Secara lalai (default), pengguna baru adalah 'pelajar'
            $table->string('role')->default('pelajar')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Membuang kolum role jika migration di-rollback
            $table->dropColumn('role');
        });
    }
};