<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabel landasan_hukums — sudah terkonsolidasi:
     * - Nama tabel langsung 'landasan_hukums' (sudah di-rename)
     * - Kolom bidang_id (NOT NULL, FK → bidangs)
     */
    public function up(): void
    {
        Schema::create('landasan_hukums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidang_id')->constrained('bidangs')->onDelete('cascade');
            $table->string('jenis_peraturan');
            $table->string('nomor_peraturan');
            $table->year('tahun_peraturan');
            $table->text('tentang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landasan_hukums');
    }
};
