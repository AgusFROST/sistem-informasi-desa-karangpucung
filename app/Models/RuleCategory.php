<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RuleCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($ruleCategory) {
            $ruleCategory->slug = Str::slug($ruleCategory->name);
        });
    }

    public function rules()
    {
        return $this->hasMany(Rule::class, 'rule_category_id');
    }
}
