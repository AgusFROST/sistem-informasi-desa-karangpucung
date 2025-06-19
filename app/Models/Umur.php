<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umur extends Model
{
    use HasFactory;
    protected $table = 'umur';
    protected $fillable = ['rentang_umur_id', 'gender_id', 'jumlah'];

    public function rentangUmur()
    {
        return $this->belongsTo(RentangUmur::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
