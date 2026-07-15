<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabel paslons — sudah terkonsolidasi (state final):
     * - jenis_pemilu (string, default 'pilpres')
     * - Semua kolom capres & cawapres
     * - Kolom jumlah_suara_presiden & jumlah_suara_wakil_presiden
     * - Kolom visi & misi
     * - Composite unique constraint: (no_urut, jenis_pemilu, tahun_pemilu)
     * - Foto disimpan sebagai string path (bukan BLOB)
     */
    public function up(): void
    {
        Schema::create('paslons', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pemilu')->default('pilpres');
            $table->integer('no_urut');
            $table->year('tahun_pemilu');
            $table->string('partai_pengusung');
            $table->bigInteger('total_suara')->default(0);

            // Data Calon Presiden / Walikota / Kandidat Utama
            $table->string('capres_nama');
            $table->string('capres_foto')->nullable();
            $table->string('capres_tempat_lahir');
            $table->date('capres_tanggal_lahir');
            $table->enum('capres_jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('capres_riwayat_pendidikan')->nullable();
            $table->text('capres_riwayat_pekerjaan')->nullable();
            $table->integer('jumlah_suara_presiden')->unsigned()->default(0);

            // Data Calon Wakil Presiden / Wakil Walikota / Kandidat Pendamping
            $table->string('cawapres_nama');
            $table->string('cawapres_foto')->nullable();
            $table->string('cawapres_tempat_lahir');
            $table->date('cawapres_tanggal_lahir');
            $table->enum('cawapres_jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('cawapres_riwayat_pendidikan')->nullable();
            $table->text('cawapres_riwayat_pekerjaan')->nullable();
            $table->integer('jumlah_suara_wakil_presiden')->unsigned()->default(0);

            // Visi & Misi Paslon
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();

            $table->timestamps();

            // Composite unique: satu nomor urut hanya boleh ada sekali per jenis & tahun pemilu
            $table->unique(['no_urut', 'jenis_pemilu', 'tahun_pemilu'], 'unique_nomor_urut_per_pemilu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paslons');
    }
};
