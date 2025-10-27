<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class PendapatanSeeder extends Seeder { 
    public function run(): void { 
        DB::table('pendapatan')->truncate(); 
        DB::table('pendapatan')->insert([ 
            ['idpendapatan' => 'PND00001', 'tgl_input' => '2025-06-01 07:00:00', 'jmlh_pendapatan' => 300000, 'idpmd' => 'PMD001'], 
            ['idpendapatan' => 'PND00002', 'tgl_input' => '2025-06-01 11:00:00', 'jmlh_pendapatan' => 400000, 'idpmd' => 'PMD002'], 
            ['idpendapatan' => 'PND00003', 'tgl_input' => '2025-06-01 16:00:00', 'jmlh_pendapatan' => 440000, 'idpmd' => 'PMD003'], 
            ['idpendapatan' => 'PND00004', 'tgl_input' => '2025-06-02 07:00:00', 'jmlh_pendapatan' => 360000, 'idpmd' => 'PMD004'], 
            ['idpendapatan' => 'PND00005', 'tgl_input' => '2025-06-02 12:00:00', 'jmlh_pendapatan' => 480000, 'idpmd' => 'PMD005'], 
            ['idpendapatan' => 'PND00006', 'tgl_input' => '2025-06-02 17:00:00', 'jmlh_pendapatan' => 380000, 'idpmd' => 'PMD006'], 
        ]); 
    } 
}