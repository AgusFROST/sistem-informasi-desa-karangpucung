<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedsosSvg extends Model
{
    use HasFactory;
    protected $table = 'medsos_svg';
    protected $fillable = ['svg', 'name'];

    public function mediaSosial()
    {
        return $this->hasMany(MediaSosial::class);
    }
}
