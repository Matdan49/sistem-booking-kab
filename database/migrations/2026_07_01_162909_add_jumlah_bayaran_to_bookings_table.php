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
        // Tambah kolum bayaran (Format: 8 digit, 2 titik perpuluhan cth: 99999.99)
        $table->decimal('jumlah_bayaran', 8, 2)->default(0.00)->after('tujuan_tempahan');
    });
}

public function down(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        // Buang kolum jika kita 'rollback'
        $table->dropColumn('jumlah_bayaran');
    });
}
};
