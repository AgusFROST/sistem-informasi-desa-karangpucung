<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Umur;
use App\Models\RentangUmur;
use App\Models\Gender;

class UmurSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            '0-4'   => ['Laki - Laki' => 286, 'Perempuan' => 290],
            '5-9'   => ['Laki - Laki' => 267, 'Perempuan' => 199],
            '10-14' => ['Laki - Laki' => 238, 'Perempuan' => 255],
            '15-19' => ['Laki - Laki' => 261, 'Perempuan' => 244],
            '20-24' => ['Laki - Laki' => 279, 'Perempuan' => 265],
            '25-29' => ['Laki - Laki' => 236, 'Perempuan' => 226],
            '30-34' => ['Laki - Laki' => 266, 'Perempuan' => 253],
            '35-39' => ['Laki - Laki' => 279, 'Perempuan' => 251],
            '40-44' => ['Laki - Laki' => 251, 'Perempuan' => 231],
            '45-49' => ['Laki - Laki' => 233, 'Perempuan' => 224],
            '50-54' => ['Laki - Laki' => 225, 'Perempuan' => 248],
            '55-59' => ['Laki - Laki' => 224, 'Perempuan' => 250],
            '60-64' => ['Laki - Laki' => 171, 'Perempuan' => 178],
            '65-69' => ['Laki - Laki' => 127, 'Perempuan' => 139],
            '70-74' => ['Laki - Laki' => 81, 'Perempuan' => 87],
            '75+'   => ['Laki - Laki' => 94, 'Perempuan' => 74],
        ];

        // Ambil ID berdasarkan jenis kelamin
        $genders = Gender::pluck('id', 'jenis_kelamin');
        // Ambil ID berdasarkan rentang umur
        $rentangUmur = RentangUmur::pluck('id', 'usia');

        foreach ($data as $usia => $jumlah) {
            // Pastikan usia dan gender tersedia di database
            if (isset($rentangUmur[$usia]) && isset($genders['Laki - Laki']) && isset($genders['Perempuan'])) {
                Umur::create([
                    'rentang_umur_id' => $rentangUmur[$usia],
                    'gender_id' => $genders['Laki - Laki'],
                    'jumlah' => $jumlah['Laki - Laki']
                ]);

                Umur::create([
                    'rentang_umur_id' => $rentangUmur[$usia],
                    'gender_id' => $genders['Perempuan'],
                    'jumlah' => $jumlah['Perempuan']
                ]);
            } else {
                // Jika ada yang tidak ditemukan, tampilkan pesan agar bisa dicek
                echo "Data usia '$usia' atau gender tidak ditemukan di database. Pastikan seeder dijalankan dengan benar.\n";
            }
        }
    }
}
