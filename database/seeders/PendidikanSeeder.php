<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Tidak Sekolah / Tidak Tamat SD', 'jumlah' => 254],
            ['name' => 'SD dan Sederajat', 'jumlah' => 1408],
            ['name' => 'SMP dan Sederajat', 'jumlah' => 715],
            ['name' => 'SMA dan Sederajat', 'jumlah' => 743],
            ['name' => 'Diploma 1-3', 'jumlah' => 88],
            ['name' => 'S1 dan Sederajat', 'jumlah' => 150],
            ['name' => 'S2 dan Sederajat', 'jumlah' => 11],
            ['name' => 'S3 dan Sederajat', 'jumlah' => 0],
        ];

        foreach ($data as $item) {
            Pendidikan::create($item);
        }
    }
}
