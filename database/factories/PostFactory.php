<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Nama model yang terkait dengan factory.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Definisikan model default untuk factory.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_uid' => 'c1b003a0-d160-46cf-a604-be08a645ad09',
            'title' => $this->faker->sentence(),
            'slug' => function (array $attributes) {
                return Str::slug($attributes['title']);
            },
            'img' => '',
            'context' => $this->faker->paragraph(),
            'views' => $this->faker->numberBetween(0, 1000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
