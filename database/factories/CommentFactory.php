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
            "¡Wow, esto es increíble! 😍 Me encanta el vibe",
            "Jaja, ¿qué es esto? Parece un meme 😂",
            "Pfff, qué aburrido, pon algo mejor 🙄",
            "¡Arte puro! Esto merece un premio 🖼️",
            "No entiendo nada, pero igual mola 😎",
            "Esto es una pérdida de tiempo 🚫",
            "¡Qué fotaza! Parece de película 🎬",
            "Mi gato hace cosas más interesantes 😼",
            "¡Por favor, más de esto! Estoy enamorado 😊",
            "Parece hecho por un niño de 5 años 🤦‍♂️",
            "Vibes de verano, me flipa 🌊",
            "Esto es lo peor que he visto en mi vida 😤",
            "¡Qué creativo! Quiero aprender a hacer esto ✍️",
            "Meh, mi móvil saca mejores fotos 📸",
            "¡Épico! Esto va directo a mi fondo de pantalla 🔥",
            "No sé qué miro, pero me da risa 🤪",
            "¡Qué hermosa composición! 😌",
            "Esto es un desastre, quién sube esto? 😒",
            "¡Amo los colores! Tan vibrante 🌈",
            "Siguiente, por favor, qué aburrimiento 😴",
            "¡Qué momento tan bien capturado! 📷",
            "Parece un filtro de Snapchat barato 😅",
            "¡Esto me inspira! Gran trabajo 👏",
            "Horrible, no sé cómo alguien le da like 😑",
            "¡Qué nostalgia! Me recuerda a mi infancia 🥰",
            "Esto es un caos, no entiendo nada 🤯",
            "¡Qué pasada! Quiero estar ahí ahora 🌴",
            "No me gusta, pero respeto el esfuerzo 🤷‍♀️",
            "¡Esto es lo más cool que he visto hoy! 😜",
            "Qué mal gusto, por dios 😖",
            "¡OMG, esto es una OBRA MAESTRA! 😍🔥",
            "Lmao, ¿esto qué es? Mi perro lo hace mejor 😂🤓",
            "Sinceramente, basura. No pierdan su tiempo 😒👎",
            "Wow, qué vibra tan mágica, me transporta ✨🌌",
            "JAJAJA, ¿en serio subieron esto? Qué cringe 😬",
            "¡Arte puro! Esto merece estar en un museo 🖼️🙌",
            "Nah, paso. Esto no es lo mío 😴💤",
            "¡QUÉ FOTÓN! Parece sacado de un sueño 📸😮",
            "Eeeeh, ¿y esto? No capto la idea 🤔🧐",
            "¡Amo, amo, AMO esto! Más porfa 😻💖",
            "Qué desperdicio de píxeles, horrible 😣🚮",
            "Esto me da vida, qué energía tan brutal 🌈⚡",
            "Pff, mi sobrino de 3 años dibuja mejor 🙄✏️",
            "¡Qué captura tan épica! Quiero el detrás de escena 🎬",
            "Esto es un chiste, ¿no? Porque no le veo sentido 😅",
            "¡Hermosura total! Esto es para enmarcar 🥰🖌️",
            "No sé quién aprobó esto, pero fatal 😤👊",
            "¡Vibes aesthetic al 100%! Mi nuevo fondo de pantalla 🌿📱",
            "Qué cosa más random, me confunde pero me gusta 🤪🌟",
            "¡Esto es next level! Gran trabajo, de verdad 👏🔝",
            "Aburrido, parece un filtro de IG del 2015 😑📷",
            "¡Qué nostalgia me da esto! Volví a mi infancia 🧸😌",
            "En serio, ¿quién pierde tiempo en esto? 🙄⏳",
            "¡Esto es fuego puro! No puedo parar de mirarlo 🔥👀",
            "Meh, visto uno, vistos todos. Nada nuevo 😐",
            "¡Qué creatividad! Esto es inspiración total 🎨💡",
            "Esto es un NO rotundo. Qué mal gusto 😖❌",
            "¡Qué momentazo capturaron! Estoy obsesionado 😍📸",
            "Parece hecho en Paint, qué desastre 🤦‍♀️💻",
            "¡Esto me alegra el día! Gracias por compartir 🥳🌞",
            "Horrible, quítenlo de mi vista por favor 😵‍💫🙈",
            "¡Qué joya! Esto es para compartir con todos 💎📲",
            "Sin ofender, pero esto es un caos total 😬🤷‍♂️",
            "¡Qué belleza! Me da paz solo de verlo 🌊🧘‍♀️",
            "Esto es tan malo que casi me da risa 😆🤡"
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
