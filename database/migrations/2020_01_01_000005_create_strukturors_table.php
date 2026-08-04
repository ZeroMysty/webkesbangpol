<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabel strukturors — sudah terkonsolidasi:
     * - Kolom foto_profile sudah langsung ada di sini
     */
    public function up(): void
    {
        Schema::create('strukturors', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('nip')->nullable();
            $table->string('golongan')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('foto_profile')->nullable();
            $table->timestamps();
        });
    }

    // Catatan: kolom parent_id, x, y, color ditambahkan via migration terpisah
    // setelah tabel ini dibuat.

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('strukturors');
    }
};
