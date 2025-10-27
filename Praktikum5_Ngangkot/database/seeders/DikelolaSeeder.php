<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class DikelolaSeeder extends Seeder { 
    public function run(): void { 
        DB::table('dikelola')->truncate(); 
        DB::table('dikelola')->insert([ 
            ['idkelola' => 'KLA001', 'idadmin' => 'ADM001', 'norute' => 'RT-0001'], 
            ['idkelola' => 'KLA002', 'idadmin' => 'ADM002', 'norute' => 'RT-0002'], 
            ['idkelola' => 'KLA003', 'idadmin' => 'ADM001', 'norute' => 'RT-0006'], 
            ['idkelola' => 'KLA004', 'idadmin' => 'ADM003', 'norute' => 'RT-0003'], 
            ['idkelola' => 'KLA005', 'idadmin' => 'ADM004', 'norute' => 'RT-0004'], 
            ['idkelola' => 'KLA006', 'idadmin' => 'ADM005', 'norute' => 'RT-0005'], 
        ]); 
    } 
}