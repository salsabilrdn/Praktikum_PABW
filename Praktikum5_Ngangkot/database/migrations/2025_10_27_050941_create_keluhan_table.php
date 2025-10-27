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
        Schema::create('keluhan', function (Blueprint $table) {
            $table->char('idkeluhan', 8)->primary();
            $table->dateTime('tgl_keluhan')->nullable();
            $table->string('tujuan_keluhan', 15)->nullable();
            $table->tinyText('isi_keluhan')->nullable();
            $table->longText('lampiran')->nullable();
            $table->string('status', 20)->default('Belum Direspons');
            $table->char('idpeng', 8)->nullable();
            $table->foreign('idpeng')->references('idpeng')->on('pengguna');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluhan');
    }
};