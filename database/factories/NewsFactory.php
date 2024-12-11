<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->sentence(mt_rand(2, 8)),
            'slug'          => $this->faker->slug(),
            'details'       => $this->faker->paragraph(),
            'excerpt'       => $this->faker->paragraph(),
            'image'         => 'post.jpg',
            'status'        => 1,
            'featured'      => 1,
            'user_id'       => mt_rand(1, 2),
            'category_id'   => $this->faker->numberBetween(1, 9)
        ];
    }
}
