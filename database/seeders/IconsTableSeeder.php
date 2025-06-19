<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IconsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icons')->insert([
            'id' => 1,
            'img' => 'icon/1737117464_logo-cilacap.png',
            'created_at' => Carbon::parse('2025-01-08 17:19:28'),
            'updated_at' => Carbon::parse('2025-01-08 17:23:59'),
        ]);
    }
}
