<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel riwayat sesi import Excel
        Schema::create('import_batches', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->integer('imported_count')->default(0);
            $table->integer('skipped_count')->default(0);
            $table->string('imported_by')->nullable();
            $table->timestamps();
        });

        // Kolom penanda pada ormas — null berarti data manual
        Schema::table('ormas', function (Blueprint $table) {
            $table->unsignedBigInteger('import_batch_id')->nullable()->after('sumber_data');
            $table->foreign('import_batch_id')
                  ->references('id')
                  ->on('import_batches')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('ormas', function (Blueprint $table) {
            $table->dropForeign(['import_batch_id']);
            $table->dropColumn('import_batch_id');
        });
        Schema::dropIfExists('import_batches');
    }
};
