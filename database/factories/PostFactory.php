<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence(1); // Generated Title
        $slug = Str::slug($title); // Generated Slug
        return [
            'user_id' => User::all()->random()->id, // Assigned User in Database
            'category_id' => Category::all()->random()->id, // Assigned Category in Database
            'title' => $title, // Assigned Title in Database
            'extract' => $this->faker->text(250), // Assigned Extract in Database
            'body' => $this->faker->text(2000), // Assigned Body in Database
            'status' => $this->faker->randomElement(['0', '1']), // Assigned Status in Database
            'slug' => $slug, // Assigned Slug in Database
        ];
    }
}
