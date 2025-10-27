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
        Schema::create('pengemudi', function (Blueprint $table) {
            $table->char('idpmd', 8)->primary();
            $table->string('nama_pmd', 30)->nullable();
            $table->string('jk_pmd', 10)->nullable();
            $table->string('jalan', 25)->nullable();
            $table->string('kota', 15)->nullable();
            $table->date('tgl_lhrpmd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengemudi');
    }
};
