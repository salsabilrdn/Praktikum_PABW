<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class NomortelpAdmindishubSeeder extends Seeder { 
    public function run(): void { 
        DB::table('nomortelp_admindishub')->truncate(); 
        DB::table('nomortelp_admindishub')->insert([ 
            ['notelpmin' => '081234567890', 'idadmin' => 'ADM001'], 
            ['notelpmin' => '081234567891', 'idadmin' => 'ADM001'], 
            ['notelpmin' => '082198765432', 'idadmin' => 'ADM002'], 
            ['notelpmin' => '083811223344', 'idadmin' => 'ADM003'], 
            ['notelpmin' => '085766554433', 'idadmin' => 'ADM004'], 
            ['notelpmin' => '087899001122', 'idadmin' => 'ADM005'], 
            ['notelpmin' => '089612345678', 'idadmin' => 'ADM006'], 
        ]); 
    } 
}