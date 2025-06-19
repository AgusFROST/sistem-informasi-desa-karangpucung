<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdgsImg extends Model
{
    use HasFactory;

    protected $table = 'sdgs_img'; // Nama tabel untuk model SdgsImg


    // Relasi satu ke banyak ke tabel sdgs
    public function sdgs()
    {
        return $this->hasMany(Sdgs::class, 'sdgs_img_id'); // Kolom foreign key di tabel SDGs
    }
}
