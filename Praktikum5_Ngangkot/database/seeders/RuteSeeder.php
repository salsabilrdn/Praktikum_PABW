<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class RuteSeeder extends Seeder { 
    public function run(): void { 
        DB::table('rute')->truncate(); 
        DB::table('rute')->insert([ 
            ['norute' => 'RT-0001', 'tarif_rute' => 5000, 'panjang_rute' => 18], 
            ['norute' => 'RT-0002', 'tarif_rute' => 5000, 'panjang_rute' => 12], 
            ['norute' => 'RT-0003', 'tarif_rute' => 5000, 'panjang_rute' => 15], 
            ['norute' => 'RT-0004', 'tarif_rute' => 5000, 'panjang_rute' => 13], 
            ['norute' => 'RT-0005', 'tarif_rute' => 5000, 'panjang_rute' => 22], 
            ['norute' => 'RT-0006', 'tarif_rute' => 5000, 'panjang_rute' => 0], 
        ]); 
    } 
}