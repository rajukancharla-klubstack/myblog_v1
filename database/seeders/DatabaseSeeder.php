<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->count(10)
            ->has(Post::factory()->count(5))
            ->has(Comment::factory()->count(3))
            ->has(Like::factory()->count(2))
            ->create();
    }
}
