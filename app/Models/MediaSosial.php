<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSosial extends Model
{
    use HasFactory;

    protected $table = 'media_sosial';
    protected $fillable = ['medsos_svg_id', 'url'];

    public function medsosSvg()
    {
        return $this->belongsTo(MedsosSvg::class);
    }
}
