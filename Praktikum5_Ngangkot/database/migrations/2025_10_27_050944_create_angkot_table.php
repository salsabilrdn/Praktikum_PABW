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
        Schema::create('angkot', function (Blueprint $table) {
            $table->char('idangkot', 8)->primary();
            $table->string('jenis_angkot', 20)->nullable();
            $table->string('plat_angkot', 15)->unique()->nullable();
            $table->integer('kapasitas_angkot')->nullable();
            $table->string('noalat_gps', 15)->unique()->nullable();
            $table->char('idtrayek', 8);
            $table->foreign('idtrayek')->references('idtrayek')->on('trayek');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angkot');
    }
};