<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabel visi_misis — sudah terkonsolidasi:
     * - Kolom visi & misi bertipe text (bukan string)
     * - Kolom sejarah_image
     */
    public function up(): void
    {
        Schema::create('visi_misis', function (Blueprint $table) {
            $table->id();
            $table->text('visi');
            $table->text('misi');
            $table->text('sejarah')->nullable();
            $table->string('sejarah_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visi_misis');
    }
};
