<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KontakDesaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontak_desa')->insert([
            'id' => 1,
            'no_telp' => 'xxxxx',
            'email' => 'desakarangpucung26@gmail.com',
            'waktu' => "Senin - Kamis (08.00 - 15.00) & Jum'at (08.00 - 11.00)",
            'alamat' => 'Jl. Pramuka No.09 Dusun Karangpucung',
        ]);
    }
}
