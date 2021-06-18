<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(20),
            'body' => $this->faker->realText(),
            'writer_id' => '',
            'status' => Blog::writer_status['publish'],
            'checker_status' => Blog::checker_status['published'],
            'checker_id' => rand(1, User::count()),
            'category_id' => rand(1, Category::count()),
        ];


    }
}
