<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Faker\Factory as Faker;

class PenggunaSeeder extends Seeder { 
    public function run(): void { 
        DB::table('pengguna')->truncate(); 

        $faker = Faker::create('id_ID');

        // 1. Data Manual Awal (Contoh Sabil)
        DB::table('pengguna')->insert([
            'idpeng' => 'PG001', 'namapeng' => 'Salsabila Rahmadina', 'email' => 'sabil@email.com', 'password' => 'pass123', 'pekerjaan_peng' => 'Mahasiswa', 'remember_token' => NULL,
        ]);

        // 2. Generate 20 Data Otomatis (Memenuhi Syarat Tugas)
        for ($i = 2; $i <= 21; $i++) {
            $id = 'PG' . str_pad($i, 3, '0', STR_PAD_LEFT);
            DB::table('pengguna')->insert([
                'idpeng' => $id,
                'namapeng' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => 'password123',
                'pekerjaan_peng' => $faker->randomElement(['Pelajar', 'Wiraswasta', 'Pekerja Kantoran', 'Pengemudi']),
                'remember_token' => NULL,
            ]);
        } 
    } 
}