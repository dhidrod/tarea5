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
            'Me encanta! 😍',
            'Genial! Pero ¿por qué ese fondo tan oscuro? 🤔',
            'Buena imagen! Aunque le falta un poco de brillo, no sé…',
            'Excelente! Me recuerda a mi infancia, qué nostalgia',
            'Muy bien! Pero creo que el perro de la izquierda está fuera de lugar 🐶',
            'Me gusta! Aunque soy más de gatos, jeje 🐱',
            'Buen trabajo! ¿Quién lo hizo? Quiero felicitar al artista 🎨',
            'Espectacular! Esto merece un premio, en serio 🏆',
            'Impresionante! Pero ¿ese pájaro con sombrero? JAJAJA me mata 😂',
            'Fantástico! Aunque no entiendo por qué hay un tanque ahí… 🤷‍♂️',
            'Increíble! Me lo pongo de fondo de pantalla YA 📱',
            'Muy bonita imagen, pero creo que le falta un poco de acción ⚡',
            'No me gusta, lo siento, no es mi estilo 😕',
            'No entiendo por qué le gusta a la gente, parece un meme mal hecho 😅',
            'Es interesante… aunque me da un poco de miedo esa máscara 😱',
            'No me parece tan buena, esperaba algo más épico, la verdad',
            'Sencillo pero efectivo, me gusta lo minimalista 👌',
            'No me gustan los colores, muy apagados para mi gusto 🎨',
            'Es una imagen sencilla pero me gusta, tiene su encanto ✨',
            'No entiendo, ¿qué se supone que estoy viendo? ¿Un pájaro detective? 🕵️‍♀️',
            'Es una imagen muy interesante, me hace pensar en un sueño que tuve…',
            'Me encanta el color, ese azul es súper vibrante 💙',
            'No me parece tan interesante, he visto mejores 🤷‍♀️',
            'Es una imagen muy bonita, pero ¿dónde está el té de verdad? ☕',
            'No me gustan las imágenes de este estilo, prefiero algo más realista 📷',
            'Es una imagen muy mala, parece que la hizo mi sobrino de 5 años 🖍️',
            'Me encanta la creatividad, nunca había visto perros bailando así 🐾💃',
            '¿Esto es arte o un error? No sé si reírme o preocuparme 😅',
            '¡Qué locura! Me imaginé a mi perro rapeando también 🐶🎤',
            'Esto es demasiado random, pero me encanta el vibe caótico 🌪️',
            'No sé si es genial o un desastre, pero no puedo dejar de mirarlo 👀',
            '¡Ese pájaro con sombrero es mi nuevo héroe! 🦜🕵️',
            '¿Por qué hay tantos perros? JAJA me da ansiedad pero está divertido 🐕🐕🐕',
            'Esto parece un sueño que tuve después de comer pizza a medianoche 🍕💤',
            '¡Quiero un póster de esto para mi cuarto! 🖼️',
            'Meh, está bien, pero no me transmite nada especial 😐',
            '¡Es como si mi perro y yo hiciéramos una fiesta! 🥳🐾',
            'Esto es arte puro, no acepto críticas 🎨✨',
            '¿Quién necesita café cuando tienes imágenes así para despertarte? ☕😂',
            'La máscara me dio escalofríos, pero está súper bien hecha 😱👍',
            '¡Ese tanque parece sacado de un videojuego! 🎮',
            'No sé si amarlo u odiarlo, pero definitivamente no lo olvido 🤯',
            'Esto es lo más raro que he visto hoy, y vivo con un gato que usa gafas 🐱',
            '¡Me hace feliz solo de verlo! Qué buena vibra 🌈',
            'Es como si mi imaginación cobrara vida, pero con más perros 🐶💭',
            'Siento que esta imagen me está juzgando… pero me gusta 😅',
            '¡Necesito saber la historia detrás de esto! ¿Quién es el pájaro? 🕵️‍♂️',
            'Esto es tan raro que me encanta, nunca había visto algo así 🌟',
            'No sé si es una obra maestra o un caos total, pero me tiene enganchado 🎶',
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
