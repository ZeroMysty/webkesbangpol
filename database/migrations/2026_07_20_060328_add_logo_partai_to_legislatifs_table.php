<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Menambahkan kolom 'logo_partai' pada tabel legislatifs.
     * Data caleg tetap per-baris (1 baris = 1 kandidat), tapi logo partai
     * cukup diupload SEKALI saja di salah satu kandidat dari partai yang
     * sama — halaman publik akan otomatis memakai logo itu untuk
     * merepresentasikan seluruh kandidat partai tsb di dalam 1 card partai.
     */
    public function up(): void
    {
        Schema::table('legislatifs', function (Blueprint $table) {
            if (!Schema::hasColumn('legislatifs', 'logo_partai')) {
                $table->string('logo_partai')->nullable()->after('nama_partai');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('legislatifs', function (Blueprint $table) {
            if (Schema::hasColumn('legislatifs', 'logo_partai')) {
                $table->dropColumn('logo_partai');
            }
        });
    }
};