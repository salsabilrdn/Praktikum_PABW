<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class MengendaraiSeeder extends Seeder { 
    public function run(): void { 
        DB::table('mengendarai')->truncate(); 
        DB::table('mengendarai')->insert([ 
            ['idkendara' => 'AA1-0001', 'idangkot' => 'ANGK001', 'idpmd' => 'PMD001', 'tgl_pjln' => '2026-01-01', 'jam_brkt' => '2026-01-01 06:30:00', 'jam_selesai' => '2026-01-01 15:30:00'], 
            ['idkendara' => 'AA1-0002', 'idangkot' => 'ANGK002', 'idpmd' => 'PMD002', 'tgl_pjln' => '2026-01-01', 'jam_brkt' => '2026-01-01 06:40:00', 'jam_selesai' => '2026-01-01 15:50:00'], 
            ['idkendara' => 'AA1-0003', 'idangkot' => 'ANGK003', 'idpmd' => 'PMD003', 'tgl_pjln' => '2026-01-01', 'jam_brkt' => '2026-01-01 06:43:00', 'jam_selesai' => '2026-01-01 16:30:00'], 
            ['idkendara' => 'AA1-0004', 'idangkot' => 'ANGK004', 'idpmd' => 'PMD004', 'tgl_pjln' => '2026-01-01', 'jam_brkt' => '2026-01-01 06:45:00', 'jam_selesai' => '2026-01-01 16:00:00'], 
            ['idkendara' => 'AA1-0005', 'idangkot' => 'ANGK005', 'idpmd' => 'PMD005', 'tgl_pjln' => '2026-01-01', 'jam_brkt' => '2026-01-01 06:00:00', 'jam_selesai' => '2026-01-01 15:00:00'], 
            ['idkendara' => 'AA1-0006', 'idangkot' => 'ANGK006', 'idpmd' => 'PMD006', 'tgl_pjln' => '2026-01-01', 'jam_brkt' => '2026-01-01 06:10:00', 'jam_selesai' => '2026-01-01 15:32:00'], 
        ]); 
    } 
}