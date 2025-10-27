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
        Schema::create('jalan_dilalui', function (Blueprint $table) {
            $table->char('idjalan', 8)->primary();
            $table->string('nama_jalan', 30)->nullable();
            $table->integer('pjg_jalan')->nullable();
            $table->char('norute', 8)->nullable();
            $table->integer('urutan_berangkat')->nullable();
            $table->integer('urutan_pulang')->nullable();
            $table->foreign('norute')->references('norute')->on('rute');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jalan_dilalui');
    }
};
