<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan_kajians', function (Blueprint $table) {
            if (!Schema::hasColumn('laporan_kajians', 'tanggal')) {
                $table->date('tanggal')->nullable()->after('title');
            }
        });
    }

    public function down(): void
    {
        Schema::table('laporan_kajians', function (Blueprint $table) {
            if (Schema::hasColumn('laporan_kajians', 'tanggal')) {
                $table->dropColumn('tanggal');
            }
        });
    }
};
