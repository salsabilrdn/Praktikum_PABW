<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class NomortelpPengemudiSeeder extends Seeder { 
    public function run(): void { 
        DB::table('nomortelp_pengemudi')->truncate(); 
        DB::table('nomortelp_pengemudi')->insert([ 
            ['notelppmd' => '828372817483', 'idpmd' => 'PMD001'], 
            ['notelppmd' => '88237426718', 'idpmd' => 'PMD002'], 
            ['notelppmd' => '83242987481', 'idpmd' => 'PMD003'], 
            ['notelppmd' => '824392874', 'idpmd' => 'PMD004'], 
            ['notelppmd' => '834625348164', 'idpmd' => 'PMD005'], 
            ['notelppmd' => '815461280938', 'idpmd' => 'PMD006'], 
        ]); 
    } 
}