<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Asigna cada imagen a un usuario existente
            'user_id'     => User::inRandomOrder()->first()->id,
            // Genera un nombre de imagen simulado
            //'image_path'  => 'images/' . $this->faker->imageUrl(800, 600),
            'image_path'  => 'images/' . Str::random(12) . '.jpg',
            'description' => $this->faker->sentence(8),
        ];
    }
}
