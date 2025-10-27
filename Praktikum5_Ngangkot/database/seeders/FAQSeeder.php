<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class FAQSeeder extends Seeder { 
    public function run(): void { 
        DB::table('faq')->truncate(); 
        DB::table('faq')->insert([ 
            ['pertanyaan' => 'Apakah aplikasi Ngangkot gratis digunakan?', 'jawaban' => 'Ya, semua fitur di aplikasi Ngangkot bisa diakses secara gratis.'], 
            ['pertanyaan' => 'Bagaimana cara melihat rute angkot dari lokasi saya?', 'jawaban' => 'Gunakan fitur "Navigasi", masukkan lokasi awal dan tujuan untuk melihat rute angkot yang tersedia.'], 
            ['pertanyaan' => 'Apa yang harus saya lakukan jika menemukan supir yang tidak sopan?', 'jawaban' => 'Laporkan melalui menu "Laporan" dan pilih kategori yang sesuai untuk mengirimkan keluhan.'], 
            ['pertanyaan' => 'Apakah saya perlu daftar untuk menggunakan Ngangkot?', 'jawaban' => 'Ya, untuk menyimpan riwayat dan rute favorit, kamu perlu melakukan registrasi terlebih dahulu.'], 
        ]); 
    } 
}