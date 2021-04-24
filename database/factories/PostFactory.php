<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $body = "";
        for ($i = 0; $i < 8; $i++) {
            $body .= $this->faker->paragraph(8);
            if ($i < 7) {
                $body .= "<br><br>";
            }
        }

        return [
            'user_id'       => User::factory(),
            'category_id'   => Category::factory(),
            'title'         => $this->faker->sentence(),
            'excerpt'       => $this->faker->paragraph(),
            'body'          => $body,
            'published_at'  => $this->faker->dateTimeBetween('-1 year', 'now'),
            'slug'          => $this->faker->slug(),
            'image_url'     => 'https://source.unsplash.com/random/1920x1080',
        ];
    }
}
