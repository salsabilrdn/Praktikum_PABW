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
        Schema::create('mengendarai', function (Blueprint $table) {
            $table->char('idkendara', 8)->primary();
            $table->char('idangkot', 8)->nullable();
            $table->char('idpmd', 8)->nullable();
            $table->date('tgl_pjln')->nullable();
            $table->dateTime('jam_brkt')->nullable();
            $table->dateTime('jam_selesai')->nullable();
            $table->foreign('idangkot')->references('idangkot')->on('angkot');
            $table->foreign('idpmd')->references('idpmd')->on('pengemudi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mengendarai');
    }
};