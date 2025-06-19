<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdgsSkor extends Model
{
    use HasFactory;

    protected $table = 'sdgs_skor'; // Nama tabel yang terkait

    protected $fillable = ['nilai']; // Kolom yang dapat diisi secara massal
}
