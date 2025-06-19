<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Potensi;

class PotensiSeeder extends Seeder
{
    public function run()
    {
        Potensi::factory()->count(50)->create();
    }
}
