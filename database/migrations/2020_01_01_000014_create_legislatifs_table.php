<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabel legislatifs.
     */
    public function up(): void
    {
        Schema::create('legislatifs', function (Blueprint $table) {
            $table->id();
            $table->integer('no_urut')->default(0);
            $table->string('nama_lengkap');
            $table->string('tempat_lahir')->nullable();
            $table->text('riwayat_pendidikan')->nullable();
            $table->text('riwayat_pekerjaan')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('nama_partai')->nullable();
            $table->string('dapil')->nullable();
            $table->integer('suara_sah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legislatifs');
    }
};
