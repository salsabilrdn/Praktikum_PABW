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
        Schema::create('pendapatan', function (Blueprint $table) {
            $table->char('idpendapatan', 8)->primary();
            $table->dateTime('tgl_input');
            $table->integer('jmlh_pendapatan');
            $table->char('idpmd', 8);
            $table->foreign('idpmd')->references('idpmd')->on('pengemudi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendapatan');
    }
};