<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'text' => $this->faker->realText(),
           'blog_id' => rand(1, Blog::count()),
           'user_id' => rand(1, User::count()),
           'parent_id' => rand(1, Comment::count()),
        ];
    }
}
