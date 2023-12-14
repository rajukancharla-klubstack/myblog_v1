<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $user = \App\Models\User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
            ]);

            \App\Models\Post::create([
                'user_id' => $user->id,
                'title' => $faker->sentence,
                'content' => $faker->paragraph, // Add this line to include the 'content' column
                'image' => $faker->imageUrl(),
            ]);
        }
    }
}
