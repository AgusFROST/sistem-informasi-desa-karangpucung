<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SdgsImgSeeder extends Seeder
{
    public function run()
    {
        DB::table('sdgs_img')->insert([
            [
                'id' => 1,
                'title' => 'Desa Tanpa Kemiskinan',
                'img' => 'sdgs-img/desa-tanpa-kemiskinan.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Desa Tanpa Kelaparan',
                'img' => 'sdgs-img/desa-tanpa-kelaparan.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Desa Sehat dan Sejahtera',
                'img' => 'sdgs-img/desa-sehat-dan-sejahtera.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'title' => 'Pendidikan Desa Berkualitas',
                'img' => 'sdgs-img/Pendidikan-Desa-Berkualitas.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'title' => 'Keterlibatan Perempuan Desa',
                'img' => 'sdgs-img/Keterlibatan-Perempuan-Desa.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'title' => 'Desa Layak Air Bersih dan Sanitasi',
                'img' => 'sdgs-img/Desa-Layak-Air-Bersih-dan-Sanitasi.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'title' => 'Desa Berenergi Bersih dan Terbarukan',
                'img' => 'sdgs-img/Desa-Berenergi-Bersih-dan-Terbarukan.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'title' => 'Pertumbuhan Ekonomi Desa Merata',
                'img' => 'sdgs-img/Pertumbuhan-Ekonomi-Desa-Merata.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'title' => 'Infrastruktur dan Inovasi Desa Sesuai Kebutuhan',
                'img' => 'sdgs-img/Infrastruktur-dan-Inovasi-Desa-Sesuai-Kebutuhan.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'title' => 'Desa Tanpa Kesenjangan',
                'img' => 'sdgs-img/Desa-Tanpa-Kesenjangan.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'title' => 'Kawasan Pemukiman Desa Aman dan Nyaman',
                'img' => 'sdgs-img/Kawasan-Pemukiman-Desa-Aman-dan- Nyaman.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'title' => 'Konsumsi dan Produksi Desa Sadar Lingkungan',
                'img' => 'sdgs-img/Konsumsi-dan-Produksi-Desa-Sadar-Lingkungan.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'title' => 'Desa Tanggap Perubahan Iklim',
                'img' => 'sdgs-img/Desa-Tanggap-Perubahan-Iklim.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'title' => 'Desa Peduli Lingkungan Laut',
                'img' => 'sdgs-img/Desa-Peduli-Lingkungan-Laut.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'title' => 'Desa Peduli Lingkungan Darat',
                'img' => 'sdgs-img/Desa-Peduli-Lingkungan-darat.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'title' => 'Desa Damai Berkeadilan',
                'img' => 'sdgs-img/Desa-Damai-Berkeadilan.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'title' => 'Kemitraan Untuk Pembangunan Desa',
                'img' => 'sdgs-img/Kemitraan-Untuk-Pembangunan-Desa.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'title' => 'Kelembagaan Desa Dinamis dan Budaya Desa Adaptif',
                'img' => 'sdgs-img/Kelembagaan-Desa-Dinamis dan-Budaya Desa-Adaptif.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambah data lainnya sesuai kebutuhan
        ]);
    }
}
