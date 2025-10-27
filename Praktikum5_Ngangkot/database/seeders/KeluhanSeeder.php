<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class KeluhanSeeder extends Seeder { 
    public function run(): void { 
        DB::table('keluhan')->truncate(); 
        DB::table('keluhan')->insert([ 
            ['idkeluhan' => 'KL001', 'tgl_keluhan' => '2025-05-01 08:00:00', 'tujuan_keluhan' => 'PMD001', 'isi_keluhan' => 'Angkot terlambat datang', 'lampiran' => NULL, 'status' => 'Belum Direspons', 'idpeng' => 'PG001'], 
            ['idkeluhan' => 'KL002', 'tgl_keluhan' => '2025-05-10 09:15:00', 'tujuan_keluhan' => 'PMD002', 'isi_keluhan' => 'Pengemudi kurang ramah', 'lampiran' => NULL, 'status' => 'Belum Direspons', 'idpeng' => 'PG004'], 
            ['idkeluhan' => 'KL003', 'tgl_keluhan' => '2025-05-19 10:20:00', 'tujuan_keluhan' => 'PMD003', 'isi_keluhan' => 'Angkot penuh sesak', 'lampiran' => NULL, 'status' => 'Belum Direspons', 'idpeng' => 'PG001'], 
            ['idkeluhan' => 'KL004', 'tgl_keluhan' => '2025-05-22 11:10:00', 'tujuan_keluhan' => 'PMD004', 'isi_keluhan' => 'Rute tidak jelas', 'lampiran' => NULL, 'status' => 'Belum Direspons', 'idpeng' => 'PG006'], 
            ['idkeluhan' => 'KL005', 'tgl_keluhan' => '2025-05-27 12:45:00', 'tujuan_keluhan' => 'PMD005', 'isi_keluhan' => 'Pengemudi kurang sopan', 'lampiran' => NULL, 'status' => 'Belum Direspons', 'idpeng' => 'PG003'], 
            ['idkeluhan' => 'KL006', 'tgl_keluhan' => '2025-05-30 13:30:00', 'tujuan_keluhan' => 'PMD002', 'isi_keluhan' => 'Kebersihan angkot kurang terjaga', 'lampiran' => NULL, 'status' => 'Belum Direspons', 'idpeng' => 'PG004'], 
            ['idkeluhan' => 'KL007', 'tgl_keluhan' => '2025-10-14 14:03:23', 'tujuan_keluhan' => 'B 5678 CD', 'isi_keluhan' => 'tes', 'lampiran' => NULL, 'status' => 'Belum Direspons', 'idpeng' => 'PG008'], 
        ]); 
    } 
}