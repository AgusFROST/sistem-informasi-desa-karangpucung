<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Islam', 'jumlah' => 6841],
            ['name' => 'Kristen', 'jumlah' => 99],
            ['name' => 'Katholik', 'jumlah' => 23],
            ['name' => 'Hindu', 'jumlah' => 1],
            ['name' => 'Budha', 'jumlah' => 2],
            ['name' => 'Konghucu', 'jumlah' => 1],
            ['name' => 'Lainnya', 'jumlah' => 0],
        ];

        foreach ($data as $item) {
            Agama::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
