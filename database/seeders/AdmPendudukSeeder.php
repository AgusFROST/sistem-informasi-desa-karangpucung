<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdmPendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adm_penduduk')->insert([
            'id' => 1,
            'penduduk' => 6971,
            'kepala_keluarga' => 2687,
            'laki_laki' => 3534,
            'perempuan' => 3437,
            'belum_menikah' => 2713,
            'menikah' => 3710,
            'cerai_hidup' => 170,
            'cerai_mati' => 378,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
