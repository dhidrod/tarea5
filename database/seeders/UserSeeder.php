<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role' => 'admin',
            'name' => 'Admin',
            'surname' => 'User',
            'nick' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'image' => 'default.png',
        ]);

        User::factory()->count(50)->create();
    }
}
