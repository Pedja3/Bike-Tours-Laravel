<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tour;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    protected $model = Tour::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $difficulties = ['easy', 'medium', 'hard'];

        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'difficulty' => fake()->randomElement($difficulties),
        ];
    }
}
