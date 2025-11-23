<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tour;


class TourFactory extends Factory
{
    protected $model = Tour::class;
   
    public function definition(): array
    {
        $difficulties = ['easy', 'medium', 'hard'];

        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'difficulty' => fake()->randomElement($difficulties),
            'distance' => fake()->numberBetween(1, 500),
            'location' => fake()->city() 
        ];
    }
}
