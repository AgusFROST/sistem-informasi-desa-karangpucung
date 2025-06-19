<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RentangUmur;

class RentangUmurSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            '75+',
            '70-74',
            '65-69',
            '60-64',
            '55-59',
            '50-54',
            '45-49',
            '40-44',
            '35-39',
            '30-34',
            '25-29',
            '20-24',
            '15-19',
            '10-14',
            '5-9',
            '0-4'
        ];

        foreach ($data as $usia) {
            RentangUmur::create(['usia' => $usia]);
        }
    }
}
