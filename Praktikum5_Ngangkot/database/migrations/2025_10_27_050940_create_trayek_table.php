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
        Schema::create('trayek', function (Blueprint $table) {
            $table->char('idtrayek', 8)->primary();
            $table->string('titik_awal', 25)->nullable();
            $table->string('titik_akhir', 25)->nullable();
            $table->string('gambar', 15)->nullable();
            $table->char('norute', 8)->nullable();
            $table->foreign('norute')->references('norute')->on('rute');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trayek');
    }
};