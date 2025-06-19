<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SambutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sambutans')->insert([
            [
                'id' => 1,
                'name' => 'PJ Faizin, S.E',
                'body' => '<div><strong>Assalamualaikum warahmatullahi wabarakatuh</strong></div><div>Website ini hadir sebagai wujud transformasi desa Karangpucung menjadi desa yang mampu memanfaatkan teknologi informasi dan komunikasi, terintegrasi kedalam sistem online. Keterbukaan informasi publik, pelayanan publik dan kegiatan perekonomian di desa, guna mewujudkan desa Kersik sebagai desa wisata yang berkelanjutan, adaptasi dan mitigasi terhadap perubahan iklim serta menjadi desa yang mandiri.</div><div>Terima kasih kepada semua pihak yang telah banyak memberi dukungan dan kontribusi baik berupa tenaga, pikiran dan semangat, &nbsp;sehingga website ini dapat terealisasi.</div>',
                'created_at' => Carbon::create(2025, 1, 9, 13, 19, 22),
                'updated_at' => Carbon::create(2025, 1, 9, 22, 55, 3),
            ],
        ]);
    }
}
