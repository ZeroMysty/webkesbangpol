<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Semua tabel SAKIP dalam satu file — sudah terkonsolidasi:
     * - renjas
     * - renstras (dengan tahun_mulai & tahun_selesai, bukan tahun tunggal)
     * - ikus
     * - ukurkerjas
     * - lakips
     */
    public function up(): void
    {
        Schema::create('renjas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('tahun');
            $table->string('file_upload');
            $table->timestamps();
        });

        Schema::create('renstras', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('tahun_mulai');
            $table->year('tahun_selesai');
            $table->string('file_upload');
            $table->timestamps();
        });

        Schema::create('ikus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('tahun');
            $table->string('file_upload');
            $table->timestamps();
        });

        Schema::create('ukurkerjas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('tahun');
            $table->string('file_upload');
            $table->timestamps();
        });

        Schema::create('lakips', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('tahun');
            $table->string('file_upload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lakips');
        Schema::dropIfExists('ukurkerjas');
        Schema::dropIfExists('ikus');
        Schema::dropIfExists('renstras');
        Schema::dropIfExists('renjas');
    }
};
