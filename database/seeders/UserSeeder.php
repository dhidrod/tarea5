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
            'password'=> bcrypt('admin'),
            'image'   => 'default.png',
            'reputation' => 100,
        ]);
        $admin->assignRole('admin');

        // Creamos usuarios y les asignamos el rol de usuario
        User::factory()->count(10)->create()->each(fn($u) => $u->assignRole('user'));
    }
}
