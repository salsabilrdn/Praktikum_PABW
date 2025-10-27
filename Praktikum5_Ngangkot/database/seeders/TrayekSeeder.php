<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class TrayekSeeder extends Seeder { 
    public function run(): void { 
        DB::table('trayek')->truncate(); 
        DB::table('trayek')->insert([ 
            ['idtrayek' => 'BB-DYH', 'titik_awal' => 'Buah Batu', 'titik_akhir' => 'Dayeuh Kolot', 'gambar' => 'BB-DYH.png', 'norute' => 'RT-0002'], 
            ['idtrayek' => 'BB-KLP', 'titik_awal' => 'Buah Batu', 'titik_akhir' => 'Kebon Kelapa', 'gambar' => 'BB-KLP.png', 'norute' => 'RT-0001'], 
            ['idtrayek' => 'CM-SDH', 'titik_awal' => 'Cimindi', 'titik_akhir' => 'Sederhana', 'gambar' => 'CM-SDH.png', 'norute' => 'RT-0004'], 
            ['idtrayek' => 'ST-CMH', 'titik_awal' => 'Stasiun Hall', 'titik_akhir' => 'Cimahi', 'gambar' => 'ST-CMH.png', 'norute' => 'RT-0006'], 
            ['idtrayek' => 'ST-GNB', 'titik_awal' => 'Stasiun Hall', 'titik_akhir' => 'Gunung Batu', 'gambar' => 'ST-GNB.png', 'norute' => 'RT-0005'], 
            ['idtrayek' => 'ST-SRJ', 'titik_awal' => 'Stasiun Hall', 'titik_akhir' => 'Sarijadi', 'gambar' => 'ST-SRJ.png', 'norute' => 'RT-0003'], 
        ]); 
    } 
}