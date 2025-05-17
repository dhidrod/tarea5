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
            'Una foto de mi perro siendo un modelo profesional 🐶📸',
            'Mi gato pensando que es el rey de la casa 🐱👑',
            'Mi familia en modo caos total, pero los amo ❤️',
            'Mis amigos y yo sobreviviendo a un lunes cualquiera 🎉',
            'Vacaciones soñadas: sol, playa y cero preocupaciones 🌴',
            'Mi comida antes de que desaparezca en 3, 2, 1... 🍔',
            'Lo vi y no pude resistir, ¡tenía que capturarlo! 📷',
            'Cuando la vida te da limones, haz limonada… o un selfie 🍋',
            'La vida es un viaje, no un destino: ¡disfrutando cada parada! 🚗',
            'Si pudiera, lo haría de nuevo, pero con más café ☕',
            'Cuando te dicen que te pareces… ¿a un pájaro detective? 🕵️‍♂️🐦',
            'Atardecer perfecto para cerrar el día 🌅',
            'Mi intento de ser chef, ¿qué opinan? 🍳🔥',
            'Un momento épico que nunca olvidaré ⚡',
            'Mi perro y yo, listos para conquistar el mundo 🌍',
            'Cuando los gatos boxean mejor que los humanos 🐾🥊',
            'Un tanque en medio del desierto, ¿quién lo hubiera pensado? 🏜️',
            'La máscara más misteriosa que he visto nunca 🎭',
            'Un pájaro detective tomando té, porque ¿por qué no? 🐦☕',
            '¡Fiesta canina! Perros bailando al ritmo del rap 🐕🎶',
            'Cuando tu gato te roba el protagonismo en la foto 📸🐱',
            'Un día cualquiera en el paraíso, ¿quién se apunta? 🌺',
            'Mi plato favorito, hecho con amor y un poco de caos 🍝',
            'Capturé este momento y ahora no puedo dejar de mirarlo ✨',
            'La vida es mejor con amigos así 🥳',
            'Un recuerdo de viaje que me saca una sonrisa 😊',
            'Mi intento de arte: ¿genial o desastre? 🎨',
            'Cuando el paisaje te deja sin palabras 🌄',
            'Mi familia en su mejor versión caótica 😂',
            'Un selfie con mi mejor amigo de cuatro patas 🐾',
            'Cuando encuentras inspiración en los lugares más raros 🌟',
            '¡Mi gato detective resolviendo el caso del té perdido! 🐱🕵️',
            'Un día de locos, pero valió la pena 💃',
            'Cuando los perros deciden que son mejores raperos que tú 🐶🎤',
            'Un rincón de mi mundo que quería compartir 🏡',
            'Mi comida parece arte, pero sabe aún mejor 🍕',
            'Un momento de paz en medio del caos 🌳',
            'Cuando tu mascota decide que es la estrella de la foto ⭐',
            'Una aventura que nunca olvidaré, ¡qué locura! 🚀',
            'Mi intento de capturar la magia del momento 🪄',
            'Cuando los colores del cielo te enamoran 🌈',
            'Un día con amigos que se sintió como una película 🎬',
            'Mi perro bailando como si nadie lo viera 🐕💃',
            'Un té tranquilo… hasta que llegó el pájaro detective 🐦',
            'Cuando la vida te sorprende con momentos así 💖',
            'Mi gato y yo, listos para resolver misterios 🕵️‍♀️🐱',
            'Una foto que grita "¡esto es lo que soy!" 📷',
            'Un paisaje que parece sacado de un sueño 🌌',
            'Cuando los perros se roban el show en la pista de baile 🐾🎵',
            'Un recuerdo que me hace reír cada vez que lo veo 😂',
        ];
        return [
            'user_id'    => User::inRandomOrder()->first()->id,
            'image_path'      => 'default.png', // el seeder lo rellenará con una real
            'description' => $descriptions[array_rand($descriptions)],
        ];
    }
}
