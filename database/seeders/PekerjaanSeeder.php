<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pekerjaan;

class PekerjaanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Buruh Tani', 'jumlah' => 350],
            ['name' => 'Pedagang', 'jumlah' => 334],
            ['name' => 'Petani Pemilik Lahan', 'jumlah' => 212],
            ['name' => 'PNS', 'jumlah' => 57],
            ['name' => 'Guru', 'jumlah' => 54],
            ['name' => 'Pengolahan / Industri', 'jumlah' => 52],
            ['name' => 'TKI', 'jumlah' => 25],
            ['name' => 'Petani Penyewa', 'jumlah' => 9],
            ['name' => 'Perangkat Desa', 'jumlah' => 9],
            ['name' => 'Guru Agama', 'jumlah' => 7],
            ['name' => 'Buruh Nelayan', 'jumlah' => 3],
            ['name' => 'Pegawai Kantor Desa', 'jumlah' => 2],
            ['name' => 'Nelayan Pemilik Kapal / Perahu', 'jumlah' => 0],
            ['name' => 'Nelayan Penyewa Kapal / Perahu', 'jumlah' => 0],
            ['name' => 'TNI', 'jumlah' => 0],
            ['name' => 'Pemerintah', 'jumlah' => 531],
            ['name' => 'Swasta', 'jumlah' => 2102],
            ['name' => 'Lainnya', 'jumlah' => 0],
        ];

        foreach ($data as $item) {
            Pekerjaan::updateOrCreate(['name' => $item['name']], ['jumlah' => $item['jumlah']]);
        }
    }
}
