<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class AngkotSeeder extends Seeder { 
    public function run(): void { 
        DB::table('angkot')->truncate(); 
        DB::table('angkot')->insert([ 
            [
                'idangkot' => 'ANGK001', 
                'jenis_angkot' => 'Suzuki Carry', 
                'plat_angkot' => 'D 1234 AB', 
                'kapasitas_angkot' => 12, // Nilai integer
                'noalat_gps' => 'GPS001A', 
                'idtrayek' => 'BB-DYH'
            ], 
            [
                'idangkot' => 'ANGK002', 
                'jenis_angkot' => 'Daihatsu GranMax', 
                'plat_angkot' => 'B 5678 CD', 
                'kapasitas_angkot' => 14, // Nilai integer
                'noalat_gps' => 'GPS002B', 
                'idtrayek' => 'BB-KLP'
            ], 
            [ // BARIS KE-3 YANG ERROR
                'idangkot' => 'ANGK003', 
                'jenis_angkot' => 'Mitsubishi L300', // Nilai string yang terkirim ke kolom kapasitas
                'plat_angkot' => 'F 9012 EF', 
                'kapasitas_angkot' => 10, // Nilai integer yang benar
                'noalat_gps' => 'GPS003C', 
                'idtrayek' => 'BB-DYH'
            ], 
            [
                'idangkot' => 'ANGK004', 
                'jenis_angkot' => 'Toyota Kijang', 
                'plat_angkot' => 'D 3456 GH', 
                'kapasitas_angkot' => 11,
                'noalat_gps' => 'GPS004D', 
                'idtrayek' => 'ST-CMH'
            ], 
            [
                'idangkot' => 'ANGK005', 
                'jenis_angkot' => 'Isuzu Panther', 
                'plat_angkot' => 'B 7890 IJ', 
                'kapasitas_angkot' => 13,
                'noalat_gps' => 'GPS005E', 
                'idtrayek' => 'ST-GNB'
            ], 
            [
                'idangkot' => 'ANGK006', 
                'jenis_angkot' => 'Suzuki APV', 
                'plat_angkot' => 'F 1230 KL', 
                'kapasitas_angkot' => 12,
                'noalat_gps' => 'GPS006F', 
                'idtrayek' => 'ST-GNB'
            ], 
        ]); 
    } 
}