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
        $comments = [
            'Me encanta!',
            'Genial!',
            'Buena imagen!',
            'Excelente!',
            'Muy bien!',
            'Me gusta!',
            'Buen trabajo!',
            'Espectacular!',
            'Impresionante!',
            'Fantástico!',
            'Increíble!',
            'Muy bonita imagen',
            'No me gusta',
            'No entiendo por qué le gusta a la gente',
            'Es interesante',
            'No me parece tan buena',
            'Sencillo pero efectivo',
            'No me gustan los colores',
            'Es una imagen sencilla pero me gusta',
            'No entiendo',
            'Es una imagen muy interesante',
            'Me encanta el color',
            'No me parece tan interesante',
            'Es una imagen muy bonita',
            'No me gustan las imágenes de este estilo',
            'Es una imagen muy mala',
            'Me encanta la creatividad',
        ];

        return [
            // Asociamos a un usuario aleatorio
            'user_id'    => User::inRandomOrder()->first()->id,
            // Asociamos a una imagen aleatoria
            'image_id'   => Image::inRandomOrder()->first()->id,
            // Contenido de comment, aleatorio de la lista
            'content'    => $comments[array_rand($comments)],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
