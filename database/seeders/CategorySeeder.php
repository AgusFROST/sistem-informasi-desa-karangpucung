<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Peternakan',
                'slug' => 'peternakan',
                'img' => 'potensi-categories/CiWTchJE7Z2Y8SLrweZG3ygw5VudgSWxoNWMNvHO.jpg',
                'created_at' => Carbon::parse('2025-02-02 00:15:17'),
                'updated_at' => Carbon::parse('2025-02-02 00:15:17'),
            ],
            [
                'id' => 2,
                'name' => 'Pariwisata',
                'slug' => 'pariwisata',
                'img' => 'potensi-categories/nT7iONah9quLgE056oxJLzQtquWMt4HnbWuZ4VG6.jpg',
                'created_at' => Carbon::parse('2025-02-02 00:25:40'),
                'updated_at' => Carbon::parse('2025-02-02 00:25:40'),
            ],
            [
                'id' => 3,
                'name' => 'Perikanan',
                'slug' => 'perikanan',
                'img' => 'potensi-categories/XDi8bQqDtnoTrkcyeb6xS7oFKx9OXB34IJgyKhG4.png',
                'created_at' => Carbon::parse('2025-02-02 00:34:22'),
                'updated_at' => Carbon::parse('2025-02-02 00:34:22'),
            ],
            [
                'id' => 4,
                'name' => 'Pertanian',
                'slug' => 'pertanian',
                'img' => 'potensi-categories/STbsyUPcuVdVtEWO419oIqoaFlDlr79vY4GyY1ay.webp',
                'created_at' => Carbon::parse('2025-02-02 00:36:50'),
                'updated_at' => Carbon::parse('2025-02-02 00:36:50'),
            ],
        ]);
    }
}
