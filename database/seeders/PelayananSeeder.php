<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelayanan;

class PelayananSeeder extends Seeder
{
    public function run(): void
    {
        Pelayanan::create([
            'name' => 'Pelayanan KTP',
            'slug' => 'pelayanan-ktp',
            'body' => 'Pelayanan untuk pembuatan dan perpanjangan KTP.'
        ]);

        Pelayanan::create([
            'name' => 'Pelayanan KK',
            'slug' => 'pelayanan-kk',
            'body' => 'Pelayanan untuk pembuatan dan perubahan Kartu Keluarga.'
        ]);
    }
}
