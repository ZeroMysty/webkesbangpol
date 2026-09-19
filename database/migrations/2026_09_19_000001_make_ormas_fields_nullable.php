<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ormas', function (Blueprint $table) {
            $table->string('alamat')->nullable()->change();
            $table->string('bidang')->nullable()->change();
            $table->string('sumber_data')->nullable()->change();
        });

        Schema::table('pengurus_ormas', function (Blueprint $table) {
            $table->string('nama')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ormas', function (Blueprint $table) {
            $table->string('alamat')->nullable(false)->change();
            $table->string('bidang')->nullable(false)->change();
            $table->string('sumber_data')->nullable(false)->change();
        });

        Schema::table('pengurus_ormas', function (Blueprint $table) {
            $table->string('nama')->nullable(false)->change();
        });
    }
};
