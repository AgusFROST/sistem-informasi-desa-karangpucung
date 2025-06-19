<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentangUmur extends Model
{
    use HasFactory;
    protected $table = 'rentang_umur';
    protected $fillable = ['usia'];
}
