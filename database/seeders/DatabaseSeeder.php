<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
         $user = User::factory()->create();

         $categories = Category::factory(4)->create();

         foreach ($categories as $category) {
             Post::factory(8)->create([
                 'user_id'      => $user->id,
                 'category_id'  => $category->id,
             ]);
         }
    }
}
