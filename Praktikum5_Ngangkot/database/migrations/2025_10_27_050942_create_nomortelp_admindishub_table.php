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
        Schema::create('nomortelp_admindishub', function (Blueprint $table) {
            $table->string('notelpmin', 15)->primary();
            $table->char('idadmin', 8)->nullable();
            $table->foreign('idadmin')->references('idadmin')->on('admindishub')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomortelp_admindishub');
    }
};