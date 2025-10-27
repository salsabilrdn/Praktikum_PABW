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
        Schema::create('dikelola', function (Blueprint $table) {
            $table->char('idkelola', 8)->primary();
            $table->char('idadmin', 8)->nullable();
            $table->char('norute', 8)->nullable();
            $table->foreign('idadmin')->references('idadmin')->on('admindishub');
            $table->foreign('norute')->references('norute')->on('rute');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dikelola');
    }
};