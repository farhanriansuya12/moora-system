<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('penilaian')->insert([
            ['nama_pendaftar' => 'John Doe', 'tes_pemrograman_web' => 3, 'tes_pemrograman_mobil' => 2, 'tes_photoshop' => 3, 'tes_microsoft_office' => 2],
            ['nama_pendaftar' => 'Jane Smith', 'tes_pemrograman_web' => 2, 'tes_pemrograman_mobil' => 3, 'tes_photoshop' => 2, 'tes_microsoft_office' => 3],
            // Tambahkan data lainnya...
        ]);
    }
    
}
