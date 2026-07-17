<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Tambah kolum boolean (0 = nampak, 1 = sembunyi)
            if (!Schema::hasColumn('bookings', 'hidden_by_user')) {
                $table->boolean('hidden_by_user')->default(0)->after('status_kelulusan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'hidden_by_user')) {
                $table->dropColumn('hidden_by_user');
            }
        });
    }
};