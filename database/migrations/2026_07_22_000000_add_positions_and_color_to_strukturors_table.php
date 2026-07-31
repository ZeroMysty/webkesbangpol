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
        Schema::table('strukturors', function (Blueprint $table) {
            $table->integer('x')->nullable()->after('parent_id');
            $table->integer('y')->nullable()->after('x');
            $table->string('color')->default('green')->after('y');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('strukturors', function (Blueprint $table) {
            $table->dropColumn(['x', 'y', 'color']);
        });
    }
};
