<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

// Impor semua 16 Seeder Ngangkot Anda
use Database\Seeders\RuteSeeder;
use Database\Seeders\AdmindishubSeeder;
use Database\Seeders\PengemudiSeeder;
use Database\Seeders\PenggunaSeeder;
use Database\Seeders\FAQSeeder;
use Database\Seeders\TipsSeeder;
use Database\Seeders\TrayekSeeder;
use Database\Seeders\DikelolaSeeder;
use Database\Seeders\KeluhanSeeder;
use Database\Seeders\NomortelpAdmindishubSeeder;
use Database\Seeders\NomortelpPengemudiSeeder;
use Database\Seeders\NomortelpPenggunaSeeder;
use Database\Seeders\JalanDilaluiSeeder;
use Database\Seeders\PendapatanSeeder;
use Database\Seeders\AngkotSeeder;
use Database\Seeders\MengendaraiSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. MATIKAN Foreign Key checks (WAJIB saat menggunakan truncate)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 
        
        $this->call([
            // LEVEL 0: Independent
            RuteSeeder::class,
            AdmindishubSeeder::class,
            PengemudiSeeder::class,
            PenggunaSeeder::class, // Tempat Faker dijalankan
            FAQSeeder::class,
            TipsSeeder::class,

            // LEVEL 1: Anak & Relasi Dasar
            TrayekSeeder::class, 
            DikelolaSeeder::class, 
            JalanDilaluiSeeder::class,
            PendapatanSeeder::class,
            KeluhanSeeder::class, 
            
            // Tabel Nomortelp
            NomortelpAdmindishubSeeder::class, 
            NomortelpPengemudiSeeder::class,
            NomortelpPenggunaSeeder::class,

            // LEVEL 2/3: Lanjutan
            AngkotSeeder::class, 
            MengendaraiSeeder::class, 
        ]);
        
        // 2. AKTIFKAN Kembali Foreign Key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}