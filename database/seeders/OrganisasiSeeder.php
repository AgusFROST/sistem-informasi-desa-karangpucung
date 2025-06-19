<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganisasiSeeder extends Seeder
{
    public function run()
    {
        // Data untuk struktur_organisasi_id = 1
        DB::table('organisasi')->insert([
            [
                'struktur_organisasi_id' => 1,
                'jabatan' => 'Kepala Desa',
                'img' => null,  // bisa ditambahkan jika ada gambar
                'nama' => 'FAIZIN,SE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 1,
                'jabatan' => 'Sekrataris Desa',
                'img' => null,
                'nama' => 'DIRWO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 1,
                'jabatan' => 'Kaur Umum & Perencanaan',
                'img' => null,
                'nama' => 'DODY RUSDIANTO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 1,
                'jabatan' => 'Kaur Keuangan',
                'img' => null,
                'nama' => 'ERLIN PUJI RAHAYU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 1,
                'jabatan' => 'Kadus Cijoli',
                'img' => null,
                'nama' => 'YOGI PURNAMA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 1,
                'jabatan' => 'Kadus Karangpucung',
                'img' => null,
                'nama' => 'AGUS SUGOTO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 1,
                'jabatan' => 'Kadus Suryan',
                'img' => null,
                'nama' => 'SUYATNO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 1,
                'jabatan' => 'Kasi Pemerintahan',
                'img' => null,
                'nama' => 'SARYONO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 1,
                'jabatan' => 'Kasi Kesejahteraan',
                'img' => null,
                'nama' => 'RISWOKO,S.Pd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 1,
                'jabatan' => 'Kasi Pelayanan',
                'img' => null,
                'nama' => 'WATIMAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Data untuk struktur_organisasi_id = 2
        DB::table('organisasi')->insert([
            [
                'struktur_organisasi_id' => 2,
                'jabatan' => 'Ketua',
                'img' => null,
                'nama' => 'KARSONO, S.Pd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 2,
                'jabatan' => 'Wakil Ketua',
                'img' => null,
                'nama' => 'MISDJO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 2,
                'jabatan' => 'Sekretaris',
                'img' => null,
                'nama' => 'NUR SOBIB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 2,
                'jabatan' => 'Bidang Penyelenggaraan Pemerintah Desa Dan Pembinaan Kemasyarakatan',
                'img' => null,
                'nama' => 'WARSONO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 2,
                'jabatan' => 'Bidang Pembangunan Desa Dan Pemberdayaan Masyarakat Desa',
                'img' => null,
                'nama' => 'Setia Budi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 2,
                'jabatan' => 'Anggota',
                'img' => null,
                'nama' => 'DISAH',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'struktur_organisasi_id' => 2,
                'jabatan' => 'Anggota',
                'img' => null,
                'nama' => 'SUTIKNO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
