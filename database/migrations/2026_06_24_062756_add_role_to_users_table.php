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
            // 💡 Menambah kolum 'role' selepas kolum 'email' dan tetapkan nilai lalai sebagai 'student'
            $table->string('role')->default('student')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // 💡 Membuang kolum 'role' sekiranya migration di-rollback (php artisan migrate:rollback)
            $table->dropColumn('role');
        });
    }
};