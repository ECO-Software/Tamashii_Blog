<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => 'posts/' . $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) . '.jpg', // Assigned Url in Database
        ];
    }
}
