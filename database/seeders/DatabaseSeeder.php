<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
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
        if(!User::count()){
            User::factory()->count(1)->create();
        }

        Category::factory()
            ->has(Movie::factory()->count(3))
            ->count(5)->create();

    }
}
