<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmPenduduk extends Model
{
    use HasFactory;

    protected $table = 'adm_penduduk';

    protected $fillable = [
        'kepala_keluarga',
        'laki_laki',
        'perempuan',
        'penduduk',
        'penduduk_sementara',
        'mutasi_penduduk',
        'belum_menikah',
        'menikah',
        'cerai_hidup',
        'cerai_mati'
    ];
}
