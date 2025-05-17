<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Image;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $likesData = [];
        $users  = User::pluck('id')->all();
        $images = Image::pluck('id')->all();

        // Queremos, por ejemplo, hasta 500 likes
        for ($i = 0; $i < 500; $i++) {
            $userId  = $users[array_rand($users)];
            $imageId = $images[array_rand($images)];

            $likesData[] = [
                'user_id'    => $userId,
                'image_id'   => $imageId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertamos ignorando duplicados en (user_id, image_id)
        DB::table('likes')->insertOrIgnore($likesData);
    }
}
