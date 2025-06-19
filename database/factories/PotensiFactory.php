<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Potensi;
use Illuminate\Support\Str;

class PotensiFactory extends Factory
{
    protected $model = Potensi::class;

    public function definition()
    {
        $title = $this->faker->sentence(3); // Judul lebih natural
        return [
            'user_uid' => 'c1b003a0-d160-46cf-a604-be08a645ad09',
            'category_id' => 1,
            'title' => $title,
            'slug' => Str::slug($title), // Slug sesuai title
            'img' => null, // Biarkan null jika tidak ada gambar
            'body' => implode("\n\n", $this->faker->paragraphs(3)), // Gabungkan paragraf
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
