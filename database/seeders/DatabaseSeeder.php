<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //Category::factory(1)->create();

      \App\Models\User::factory(10)
          ->create()->each(function ($user){

              Blog::factory(15)->create(['user_id' => $user->id])->each(function ($blog){

              });

          });

        $this->call([
            OffensiveWordSeeder::class,
        ]);
    }
}
