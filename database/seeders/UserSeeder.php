<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creamos roles base
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        // Creamos un admin fijo y le asignamos rol
        $admin = User::create([
            'role'    => 'admin',
            'name'    => 'Admin',
            'surname' => 'User',
            'nick'    => 'admin',
            'email'   => 'admin@example.com',
            'password' => bcrypt('admin'),
            'image'   => 'default.png',
            'reputation' => random_int(10, 20),
        ]);
        $admin->assignRole('admin');

        // Creamos un usuario fijo y le asignamos rol
        $user = User::create([
            'role'    => 'user',
            'name'    => 'Daniel',
            'surname' => 'Hidalgo',
            'nick'    => 'Dani',
            'email'   => 'daniel@daniel.com',
            'password' => bcrypt('1234'),
            'image'   => 'mascara.png',
            'reputation' => random_int(1, 10),
        ]);
        $user->assignRole('user');

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
            'gatosluchando.jpg',
            'comida1.png',
            'comida2.png',
            'tanque2.jpg',
            'pajaro.jpg',
            'rap.jpg'
        ];
        // Creamos usuarios y les asignamos el rol de usuario
        //User::factory()->count(10)->create()->each(fn($u) => $u->assignRole('user'));
        User::factory()->count(50)->create()->each(function ($u) use ($imagenes) {
            $u->image = $imagenes[array_rand($imagenes)];
            $u->save();
            $u->assignRole('user');
        });
    }
}
