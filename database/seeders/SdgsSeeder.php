<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SdgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sdgs_skor')->insert([
            'nilai' => '37,84'
        ]);
        // Masukkan data ke tabel sdgs
        DB::table('sdgs')->insert([
            [
                'sdgs_img_id' => 1, // Pastikan ID gambar sudah ada di tabel sdgs_img
                'nilai' => '50,18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 2,
                'nilai' => '37,49',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 3,
                'nilai' => '65,12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 4,
                'nilai' => '28,44',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 5,
                'nilai' => '66,07',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 6,
                'nilai' => '74,47',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 7,
                'nilai' => '99,33',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 8,
                'nilai' => '24,89',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 9,
                'nilai' => '16,66',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 10,
                'nilai' => '46,75',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 11,
                'nilai' => '39,30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 12,
                'nilai' => '8,23',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 13,
                'nilai' => '8,23',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 14,
                'nilai' => '0,00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 15,
                'nilai' => '8,33',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 16,
                'nilai' => '86,70',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 17,
                'nilai' => '0,00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sdgs_img_id' => 18,
                'nilai' => '20,81',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
