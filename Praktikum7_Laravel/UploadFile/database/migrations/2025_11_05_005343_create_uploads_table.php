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
{
    Schema::create('uploads', function (Blueprint $table) {
        $table->id();
        $table->string('filename'); // Nama asli file [cite: 564, 565]
        $table->string('filepath'); // Lokasi penyimpanan file [cite: 567, 568]
        $table->timestamps();
    });
}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};
