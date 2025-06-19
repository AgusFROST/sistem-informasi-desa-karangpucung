<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdmSeeder extends Seeder
{
    public function run()
    {
        DB::table('idm')->insert([
            [
                'idm_status_id' => 1, // Sesuaikan dengan id di tabel idm_status
                'nilai' => '0.8305',
                'tahun' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
