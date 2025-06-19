<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarauselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carausels')->insert([
            [
                'id' => 1,
                'img' => 'carausel/TLkU9ZcTfW4PkNecQYxVU6x8djXW19lPdldVEGQn.jpg',
                'created_at' => '2025-01-10 09:31:58',
                'updated_at' => '2025-01-10 09:31:58',
            ],
            [
                'id' => 2,
                'img' => 'carausel/uZ0aiYkGoYcLTudVY4SYnSDsHpn41QxzhHlNLTSX.jpg',
                'created_at' => '2025-01-10 09:32:07',
                'updated_at' => '2025-01-10 09:32:07',
            ],
            [
                'id' => 3,
                'img' => 'carausel/Twc44q4aa46K28NUpPw8OUx1cpIW1nx3R6OTHufy.jpg',
                'created_at' => '2025-01-10 09:32:15',
                'updated_at' => '2025-01-10 09:32:15',
            ]
        ]);
    }
}
