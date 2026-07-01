<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Langkah 1: Semak dan tukar nama jika 'tarikh_guna' masih wujud
        if (Schema::hasColumn('bookings', 'tarikh_guna')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->renameColumn('tarikh_guna', 'tarikh_mula');
            });
        }

        // Langkah 2: Tambah 'tarikh_tamat' selepas 'tarikh_mula' (nama baharu)
        if (!Schema::hasColumn('bookings', 'tarikh_tamat')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->date('tarikh_tamat')->nullable()->after('tarikh_mula');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('bookings', 'tarikh_tamat')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('tarikh_tamat');
            });
        }

        if (Schema::hasColumn('bookings', 'tarikh_mula')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->renameColumn('tarikh_mula', 'tarikh_guna');
            });
        }
    }
};