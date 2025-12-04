<?php

namespace Database\Factories;

use App\Models\Tour;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class TourFactory extends Factory
{
    protected $model = Tour::class;

    public function definition(): array
    {
        $difficulties = ['easy', 'medium', 'hard'];

        return [
            'name' => fake()->sentence(3),
            'user_id' => User::factory(),
            'description' => fake()->paragraph(),
            'difficulty' => fake()->randomElement($difficulties),
            'distance' => fake()->numberBetween(1, 500),
            'location' => fake()->city()
        ];
    }
}
