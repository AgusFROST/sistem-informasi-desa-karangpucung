<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi';

    protected $fillable = ['name', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($struktur) {
            if (empty($struktur->slug)) {
                $struktur->slug = Str::slug($struktur->name);
            }
        });
    }

    public function organisasi()
    {
        return $this->hasMany(Organisasi::class, 'struktur_organisasi_id');
    }
}
