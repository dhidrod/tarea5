<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagenes = [
            'awakening.png',
            'mascara.png',
            'carrera.png',
            'cueva.png',
            'mar.png',
            'fiesta.png',
            'gato.png',
            'perro.png',
            'naturaleza.png',
            'squadala.png',
            'tanque.png',
            'gatosluchando.jpg',
            'comida1.png',
            'comida2.png',
            'tanque2.jpg',
            'pajaro.jpg',
            'rap.jpg'
        ];

        Image::factory()->count(100)->create()->each(function($i) use ($imagenes) {
            $i->image_path = $imagenes[array_rand($imagenes)];
            $i->save();
        });
    }
}
