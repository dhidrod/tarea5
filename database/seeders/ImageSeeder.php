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
            'default.png',
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
        ];

        Image::factory()->count(30)->create()->each(function($i) use ($imagenes) {
            $i->image_path = $imagenes[array_rand($imagenes)];
            $i->save();
        });
    }
}
