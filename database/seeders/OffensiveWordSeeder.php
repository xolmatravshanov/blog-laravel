<?php

namespace Database\Seeders;

use App\Models\OffensiveWord;
use Database\Factories\OffensiveWordFactory;
use Illuminate\Database\Seeder;

class OffensiveWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       OffensiveWord::factory()
           ->count(18)
           ->create();
    }
}
