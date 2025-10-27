<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class TipsSeeder extends Seeder { 
    public function run(): void { 
        DB::table('tips')->truncate(); 
        DB::table('tips')->insert([ 
            ['judul' => 'Bawa Uang Pas', 'deskripsi' => 'Selalu siapkan uang kecil untuk membayar ongkos tanpa kesulitan.'], 
            ['judul' => 'Pilih Angkot Resmi', 'deskripsi' => 'Pastikan naik dari terminal atau halte resmi untuk keamanan dan kenyamanan.'], 
            ['judul' => 'Jaga Barang Bawaan', 'deskripsi' => 'Simpan tas di depan tubuh, hindari bermain HP di dekat pintu.'], 
            ['judul' => 'Gunakan Aplikasi', 'deskripsi' => 'Pantau posisi angkot dan rute melalui aplikasi Ngangkot agar tidak tersesat.'], 
        ]); 
    } 
}