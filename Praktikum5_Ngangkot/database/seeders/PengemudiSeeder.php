<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class PengemudiSeeder extends Seeder { 
    public function run(): void { 
        DB::table('pengemudi')->truncate(); 
        DB::table('pengemudi')->insert([ 
            ['idpmd' => 'PMD001', 'nama_pmd' => 'Agus Salim', 'jk_pmd' => 'Laki-laki', 'jalan' => 'Jl. Merdeka', 'kota' => 'Bandung', 'tgl_lhrpmd' => '1985-01-12'], 
            ['idpmd' => 'PMD002', 'nama_pmd' => 'Rudi Hartono', 'jk_pmd' => 'Laki-laki', 'jalan' => 'Jl. Sudirman', 'kota' => 'Jakarta', 'tgl_lhrpmd' => '1990-03-25'], 
            ['idpmd' => 'PMD003', 'nama_pmd' => 'Tono Sutrisno', 'jk_pmd' => 'Laki-laki', 'jalan' => 'Jl. Asia Afrika', 'kota' => 'Bandung', 'tgl_lhrpmd' => '1987-07-04'], 
            ['idpmd' => 'PMD004', 'nama_pmd' => 'Ridwan Suswono', 'jk_pmd' => 'Laki-laki', 'jalan' => 'Jl. Soekarno Hatta', 'kota' => 'Surabaya', 'tgl_lhrpmd' => '1983-10-10'], 
            ['idpmd' => 'PMD005', 'nama_pmd' => 'Steven Wiliam', 'jk_pmd' => 'Laki-laki', 'jalan' => 'Jl. Dipatiukur', 'kota' => 'Bandung', 'tgl_lhrpmd' => '1992-06-30'], 
            ['idpmd' => 'PMD006', 'nama_pmd' => 'Yanto Saputra', 'jk_pmd' => 'Laki-laki', 'jalan' => 'Jl. Gajah Mada', 'kota' => 'Semarang', 'tgl_lhrpmd' => '1989-11-05'], 
        ]); 
    } 
}