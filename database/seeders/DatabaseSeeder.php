<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        $this->call(ColorSeeder::class);
        $tags = Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }
}
