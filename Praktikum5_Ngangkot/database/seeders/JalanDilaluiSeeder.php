<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class JalanDilaluiSeeder extends Seeder { 
    public function run(): void { 
        DB::table('jalan_dilalui')->truncate(); 
        // Mengisi data hanya untuk beberapa baris pertama sebagai contoh
        DB::table('jalan_dilalui')->insert([ 
            ['idjalan' => 'JL-00001', 'nama_jalan' => 'Terminal Buah Batu', 'pjg_jalan' => 0, 'norute' => 'RT-0001', 'urutan_berangkat' => 1, 'urutan_pulang' => 9], 
            ['idjalan' => 'JL-00002', 'nama_jalan' => 'Jl. Buah Batu', 'pjg_jalan' => 3200, 'norute' => 'RT-0001', 'urutan_berangkat' => 2, 'urutan_pulang' => 5], 
            ['idjalan' => 'JL-00003', 'nama_jalan' => 'Jl. Lengkong Besar', 'pjg_jalan' => 1500, 'norute' => 'RT-0001', 'urutan_berangkat' => 6, 'urutan_pulang' => 3], 
            ['idjalan' => 'JL-00004', 'nama_jalan' => 'Terminal Kebon Kelapa', 'pjg_jalan' => 0, 'norute' => 'RT-0001', 'urutan_berangkat' => 9, 'urutan_pulang' => 1], 
        ]); 
    } 
}