<?php

namespace Database\Factories;

use App\Models\OffensiveWord;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OffensiveWordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OffensiveWord::class;

    public $words = [
        'fuck',
        'shit',
        'piss',
        'dick',
        'asshole',
        'bitch',
        'bastard',
        'damn',
        'bollocks',
        'bugger',
        'choad',
        'crikey',
        'rubbish',
        'shag',
        'wanker',
        'piss',
        'twat',
        'suck',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
        ];
    }
}
