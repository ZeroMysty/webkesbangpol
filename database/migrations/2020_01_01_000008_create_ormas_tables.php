<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabel Ormas dalam satu file — sudah terkonsolidasi:
     * - ormas
     * - pengurus_ormas
     * - dokumen_ormas (nama tabel final setelah rename dari 'dokumen')
     */
    public function up(): void
    {
        Schema::create('ormas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->string('alamat');
            $table->string('bidang');
            $table->enum('sumber_data', ['verif', 'lsm', 'yayasan']);
            $table->timestamps();
        });

        Schema::create('pengurus_ormas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ormas_id')->constrained('ormas')->onDelete('cascade');
            $table->enum('jabatan', ['Ketua', 'Sekretaris', 'Bendahara']);
            $table->string('nama');
            $table->string('no_telepon');
            $table->timestamps();
        });

        Schema::create('dokumen_ormas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ormas_id')->constrained('ormas')->onDelete('cascade');
            $table->string('no_akta_notaris')->nullable();
            $table->date('tgl_akta_notaris')->nullable();
            $table->string('no_ahu_skt')->nullable();
            $table->date('tgl_ahu_skt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_ormas');
        Schema::dropIfExists('pengurus_ormas');
        Schema::dropIfExists('ormas');
    }
};
