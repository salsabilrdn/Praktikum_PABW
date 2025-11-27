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
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            
            // >>>>>>>>>>>>> TARUH DI SINI <<<<<<<<<<<<<
            $table->string('nama'); // [cite: 105]
            $table->string('asal_sekolah'); // [cite: 106]
            $table->string('prodi_tujuan'); // [cite: 107]
            // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
            
            $table->timestamps(); // [cite: 108]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftars');
    }
};
