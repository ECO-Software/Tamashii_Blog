<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->word(20); // Generated Name
        $slug = Str::slug($name); // Generated Slug
        return [
            'name' => $name, // Assigned Name in Database
            'slug' => $slug, // Assigned Slug in Database
        ];
    }
}
