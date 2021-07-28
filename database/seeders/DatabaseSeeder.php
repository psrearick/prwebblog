<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userCount = 4;
        $faker = Factory::create();

        $users = User::factory($userCount)->create();

        $categories = Category::factory(4)->create();

        foreach ($users as $user) {
            foreach ($categories as $category) {
                Post::factory(6)
                    ->has(
                        Comment::factory()->count(3))
                    ->create([
                        'user_id'      => $user->id,
                        'category_id'  => $category->id,
                    ]);
            }
        }
    }
}
