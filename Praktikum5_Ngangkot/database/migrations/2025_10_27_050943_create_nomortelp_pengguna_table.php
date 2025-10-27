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
        Schema::create('nomortelp_pengguna', function (Blueprint $table) {
            $table->string('notelppeng', 15)->primary();
            $table->char('idpeng', 8)->nullable();
            $table->foreign('idpeng')->references('idpeng')->on('pengguna')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomortelp_pengguna');
    }
};
