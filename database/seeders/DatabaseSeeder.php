<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\RuleCategory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('roles')->insert([
            ['name' => 'Umum'],
            ['name' => 'Perangkat Desa'],
            ['name' => 'Admin'],
        ]);

      
        RuleCategory::create([
            'name' => 'Peraturan Kepala Desa',
            'slug' => 'peraturan-kepala-desa',
        ]);

        RuleCategory::create([
            'name' => 'Perda',
            'slug' => 'perda',
        ]);


        // $this->call(PostSeeder::class);
        // $this->call(PotensiSeeder::class);

        $this->call(PelayananSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(IconsTableSeeder::class);
        $this->call(KontakDesaTableSeeder::class);
        $this->call(MedsosSvgSeeder::class);
        $this->call(SambutanSeeder::class);
        $this->call(AdmPendudukSeeder::class);
        $this->call(CarauselSeeder::class);
        $this->call(IdmSeeder::class);
        $this->call(SdgsImgSeeder::class);
        $this->call(SdgsSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(RentangUmurSeeder::class);
        $this->call(UmurSeeder::class);
        $this->call(PendidikanSeeder::class);
        $this->call(PekerjaanSeeder::class);
        $this->call(AgamaSeeder::class);
        $this->call(StrukturOrganisasiSeeder::class);
        $this->call(OrganisasiSeeder::class);
        $this->call(SejarahDesaSeeder::class);
        $this->call(VisiMisiSeeder::class);
    }
}
