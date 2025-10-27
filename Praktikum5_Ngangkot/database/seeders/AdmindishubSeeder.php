<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class AdmindishubSeeder extends Seeder { 
    public function run(): void { 
        DB::table('admindishub')->truncate(); 
        DB::table('admindishub')->insert([ 
            ['idadmin' => 'ADM001', 'nik_admin' => '3204123456780001', 'nama_admin' => 'Budi Santoso', 'email_admin' => 'budi.s@email.com', 'password_admin' => 'pass123', 'pekerjaan_admin' => 'Staf IT'], 
            ['idadmin' => 'ADM002', 'nik_admin' => '3204123456780002', 'nama_admin' => 'Ani Lestari', 'email_admin' => 'ani.l@email.com', 'password_admin' => 'rahasia', 'pekerjaan_admin' => 'Analis Data'], 
            ['idadmin' => 'ADM003', 'nik_admin' => '3204123456780003', 'nama_admin' => 'Rahmat Hidayat', 'email_admin' => 'rahmat.h@email.com', 'password_admin' => 'aman123', 'pekerjaan_admin' => 'Koordinator Lapangan'], 
            ['idadmin' => 'ADM004', 'nik_admin' => '3204123456780004', 'nama_admin' => 'Siti Aminah', 'email_admin' => 'siti.a@email.com', 'password_admin' => 'admin123', 'pekerjaan_admin' => 'Staf Administrasi'], 
            ['idadmin' => 'ADM005', 'nik_admin' => '3204123456780005', 'nama_admin' => 'Agus Setiawan', 'email_admin' => 'agus.s@email.com', 'password_admin' => 'qwerty', 'pekerjaan_admin' => 'Pengawas'], 
            ['idadmin' => 'ADM006', 'nik_admin' => '3204123456780006', 'nama_admin' => 'Dewi Sartika', 'email_admin' => 'dewi.s@email.com', 'password_admin' => 'password', 'pekerjaan_admin' => 'Staf Perencanaan'], 
        ]); 
    } 
}