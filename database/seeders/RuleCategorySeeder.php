<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\RuleCategory;
use Illuminate\Database\Seeder;

class RuleCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Kategori A', 'Kategori B', 'Kategori C'];

        foreach ($categories as $category) {
            RuleCategory::create(['name' => $category, 'slug' => Str::slug($category)]);
        }
    }
}
