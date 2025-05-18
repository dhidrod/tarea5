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
            "¡Qué vista tan increíble! La naturaleza nunca deja de sorprender 🌄",
            "Un rinconcito tranquilo para desconectar del mundo 🌿✨",
            "La madre naturaleza mostrando su mejor cara 🌸🌳",
            "¡Qué cosita más adorable! Me derrite el corazón 🐾❤️",
            "Observando la vida salvaje en su máximo esplendor 🦁🌍",
            "¡Estos bichos siempre sacan una sonrisa! 😂🐶",
            "Un retrato que cuenta mil historias 📸✨",
            "Momentos que valen oro con la gente que quiero 👨‍👩‍👧‍👦💛",
            "¡Esa cara lo dice todo! 😂😍",
            "Un cachivache de lo más curioso 🧐🔍",
            "Arte que te deja con la boca abierta 🎨😮",
            "Lo de siempre, pero con un twist que lo hace especial ✨",
            "¡Acción a tope! Esto es pura adrenalina 🚀💥",
            "¡A celebrar se ha dicho! 🎉🥳",
            "Creatividad a flor de piel 🎭🖌️",
            "¡Esto tiene una pinta deliciosa! Ñam ñam 🍕🤤",
            "Un plato que entra por los ojos y el estómago 🌈🍽️",
            "¡Qué invento culinario tan original! 👨‍🍳🔥",
            "Una obra que desborda creatividad por los cuatro costados 🎨🌟",
            "Un dibujo con tantos detalles que te pierdes en él ✏️🔍",
            "Imaginación al poder, ¡qué pasada! 🚀🌌",
            "Un atardecer que parece sacado de un cuento 🌅✨",
            "Explorando la jungla de asfalto 🏙️🚶‍♂️",
            "Felicidad en estado puro, ¡qué momento! 😄💖",
            "Tecnología que parece del futuro, ¡increíble! 🤖🔮",
            "Un evento que quedará grabado en la memoria 🎤🎉",
            "Un viaje al pasado que te hace reflexionar 🏛️⌛",
            "¡Reto superado! Esto es pura inspiración 💪🏆",
            "¡Colores everywhere! Esto es un festival para los ojos 🌈🎨",
            "Relax mode on, ¡qué paz! 🛀😌",
            "¡Qué sorpresa más inesperada! Me ha dejado ojiplático 😲🎁",
            "Cara a cara con la naturaleza más salvaje 🐅🌿",
            "Arquitectura que te deja sin aliento 🏰😍",
            "Luces y sombras creando magia pura 🌟🌑",
            "Tradiciones que se mantienen vivas, ¡qué bonito! 🎎🕯️",
            "Complicidad en estado puro, se nota la conexión 🤝💞",
            "¡Qué jugada! Esto es deporte de alto nivel 🏀🏅",
            "Diseño que rompe moldes, ¡qué innovador! 💡✨",
            "Música que te llega al alma 🎶❤️",
            "Un pedacito de mundo en una imagen 🌍✈️",
            "Una imagen que enseña más que mil palabras 📖💭",
            "¡Qué ocurrencia! Me saca una carcajada 😂👍"
        ];
        
        return [
            'user_id'    => User::inRandomOrder()->first()->id,
            'image_path'      => 'default.png', // el seeder lo rellenará con una real
            'description' => $descriptions[array_rand($descriptions)],
        ];
    }
}
