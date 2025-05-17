<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Asociamos a un usuario aleatorio
            'user_id'    => User::inRandomOrder()->first()->id,
            // Asociamos a una imagen aleatoria
            'image_id'   => Image::inRandomOrder()->first()->id,
            // Contenido de coment
            'content'    => $this->faker->sentence(12),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
