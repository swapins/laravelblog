<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class BlogPostSeeder extends Seeder
{
    public function run()
    {
        // Get all users from the "users" table
        $users = User::all();

        foreach ($users as $user) {
            // Generate 25 blog posts for each user
            Post::factory()->count(25)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
