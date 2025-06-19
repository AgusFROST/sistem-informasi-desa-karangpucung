<?php

namespace Database\Seeders;

use App\Models\SejarahDesa;
use Illuminate\Database\Seeder;

class SejarahDesaSeeder extends Seeder
{
    public function run()
    {
        SejarahDesa::create([
            'name' => 'Sejarah Desa Contoh',
            'slug' => 'sejarah-desa-karangpucung',
            'arsip' => 'sejarah-desa/Sejarah-Desa-Karangpucung.pdf',
        ]);
    }
}
