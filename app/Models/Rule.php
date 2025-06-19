<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = ['rule_category_id', 'name', 'slug', 'body'];

    public function category()
    {
        return $this->belongsTo(RuleCategory::class, 'rule_category_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($rule) {
            $rule->slug = Str::slug($rule->name);
        });

        static::updating(function ($rule) {
            $rule->slug = Str::slug($rule->name);
        });
    }
}
