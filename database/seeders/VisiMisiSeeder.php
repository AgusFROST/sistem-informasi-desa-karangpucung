<?php

namespace Database\Seeders;

use App\Models\VisiMisi;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    public function run()
    {
        VisiMisi::create([
            'visi' => '<div><strong>“Desa Karangpucung sebagai Desa Wisata yang mampu mengelolah potensi Desa dan pembangunan berkelanjutan untuk mewujudkan masyarakat yang sejahtera”</strong></div>',
            'misi' => '<ol><li>Mewujudkan tata kelola pemerintahan yang baik</li><li>Mengembangkan kegiatan keagamaan</li><li>Meningkatkan kualitas pendidikan dan sumber daya manusia</li><li>Mengembangkan teknologi informasi</li><li>Pembangunan infrastruktur, sarana dan prasarana</li><li>Mengembangkan seluruh usaha potensi desa</li><li>Meningkatkan kualitas dan membangun kesadaran kesehatan masyarakat</li><li>Meningkatkan perekonomian dan kesejahteraan masyarakat</li><li>Membangun kerjasama dan kemitraan strategis</li></ol>',
        ]);
    }
}
