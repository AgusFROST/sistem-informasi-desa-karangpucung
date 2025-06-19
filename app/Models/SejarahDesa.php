<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SejarahDesa extends Model
{
    use HasFactory;

    protected $table = 'sejarah_desa';

    protected $fillable = ['name', 'slug', 'arsip'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($sejarahDesa) {
            $sejarahDesa->slug = static::generateUniqueSlug($sejarahDesa->name);
        });

        static::updating(function ($sejarahDesa) {
            if ($sejarahDesa->isDirty('name')) {
                $sejarahDesa->slug = static::generateUniqueSlug($sejarahDesa->name, $sejarahDesa->id);
            }
        });
    }

    public static function generateUniqueSlug($name, $id = null)
    {
        $slug = Str::slug($name);
        $count = static::where('slug', $slug)->when($id, fn($q) => $q->where('id', '!=', $id))->count();

        return $count ? "{$slug}-" . ($count + 1) : $slug;
    }
}
