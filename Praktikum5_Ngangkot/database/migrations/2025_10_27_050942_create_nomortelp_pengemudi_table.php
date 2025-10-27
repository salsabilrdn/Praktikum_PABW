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
        Schema::create('nomortelp_pengemudi', function (Blueprint $table) {
            $table->string('notelppmd', 15)->primary();
            $table->char('idpmd', 8)->nullable();
            $table->foreign('idpmd')->references('idpmd')->on('pengemudi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomortelp_pengemudi');
    }
};
