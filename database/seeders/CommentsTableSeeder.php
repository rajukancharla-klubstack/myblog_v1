<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            $user = \App\Models\User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
            ]);

            $post = \App\Models\Post::create([
                'user_id' => $user->id,
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'image' => $faker->imageUrl(),
            ]);

            \App\Models\Comment::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'content' => $faker->paragraph,
            ]);
        }
    }
}
