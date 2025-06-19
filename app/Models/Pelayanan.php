<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pelayanan extends Model
{
    use HasFactory;

    protected $table = 'pelayanan';
    protected $fillable = ['name', 'slug', 'body'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($pelayanan) {
            $pelayanan->slug = Str::slug($pelayanan->name);
        });
    }
}
