<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    public function run(): void
    {
        Gender::insert([
            ['jenis_kelamin' => 'Laki - Laki'],
            ['jenis_kelamin' => 'Perempuan']
        ]);
    }
}
