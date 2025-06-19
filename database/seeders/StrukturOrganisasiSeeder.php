<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiSeeder extends Seeder
{
    public function run(): void
    {
        StrukturOrganisasi::create(['name' => 'Pemerintahan Desa']);
        StrukturOrganisasi::create(['name' => 'BPD (Badan Permusyawaratan Desa)']);
        StrukturOrganisasi::create(['name' => 'PKK (Pemberdayaan Kesejahteraan Keluarga)']);
        StrukturOrganisasi::create(['name' => 'Karang Taruna Bina Remaja)']);
        StrukturOrganisasi::create(['name' => 'LPMD (Lembaga Pemberdayaan Masyarakat Desa)']);
        StrukturOrganisasi::create(['name' => 'KPMD (Kader Pemberdayaan Masyarakat Desa)']);
        StrukturOrganisasi::create(['name' => 'Linmas (Perlindungan Masyarakat)']);
        StrukturOrganisasi::create(['name' => 'Posyandu (Pos Pelayanan Terpadu)']);
        StrukturOrganisasi::create(['name' => 'Posbindu (Pos Binaan Terpadu)']);
    }
}
