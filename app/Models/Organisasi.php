<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasi';

    protected $fillable = [
        'struktur_organisasi_id',
        'nama',
        'img',
        'jabatan'
    ];

    public function strukturOrganisasi()
    {
        return $this->belongsTo(StrukturOrganisasi::class, 'struktur_organisasi_id');
    }
}
