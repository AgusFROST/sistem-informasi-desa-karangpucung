<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakDesa extends Model
{
    use HasFactory;

    protected $table = 'kontak_desa';

    protected $fillable = ['no_telp', 'email', 'waktu', 'alamat'];
}
