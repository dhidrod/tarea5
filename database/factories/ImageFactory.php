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
        $descriptions = [
            'Una foto de mi perro',
            'Una foto de mi gato',
            'Una foto de mi familia',
            'Una foto de mis amigos',
            'Una foto de mis vacaciones',
            'Una foto de mi comida',
            'Lo vi y no pude resistir',
            'Cuando la vida te da limones, haz limonada',
            'La vida es un viaje, no un destino',
            'Si pudiera, lo haría de nuevo',
            'Cuando te dicen que te pareces...',
        ];
        return [
            'user_id'    => User::inRandomOrder()->first()->id,
            'image_path'      => 'default.png', // el seeder lo rellenará con una real
            'description' => $descriptions[array_rand($descriptions)],
        ];
    }
}
