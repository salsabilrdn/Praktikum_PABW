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
        Schema::create('admindishub', function (Blueprint $table) {
            $table->char('idadmin', 8)->primary();
            $table->string('nik_admin', 30)->unique();
            $table->string('nama_admin', 30);
            $table->string('email_admin', 20)->unique();
            $table->string('password_admin', 15);
            $table->string('pekerjaan_admin', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admindishub');
    }
};
