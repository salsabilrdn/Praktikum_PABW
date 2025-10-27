<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class NomortelpPenggunaSeeder extends Seeder { 
    public function run(): void { 
        DB::table('nomortelp_pengguna')->truncate(); 
        DB::table('nomortelp_pengguna')->insert([ 
            ['notelppeng' => '081234567890', 'idpeng' => 'PG001'], 
            ['notelppeng' => '082345678901', 'idpeng' => 'PG002'], 
            ['notelppeng' => '083456789012', 'idpeng' => 'PG003'], 
            ['notelppeng' => '084567890123', 'idpeng' => 'PG004'], 
            ['notelppeng' => '085678901234', 'idpeng' => 'PG005'], 
            ['notelppeng' => '086789012345', 'idpeng' => 'PG006'], 
        ]); 
    } 
}