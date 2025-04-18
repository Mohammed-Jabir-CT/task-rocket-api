<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factory>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $format = 'Y-m-d';
        $max = '+7 days';
        $date = fake()->dateTimeBetween('now', $max);

        return [
            'title' => fake()->words(3, true),
            'description' => fake()->sentence(),
            'user_id' => User::factory(),
            'due_date' => $date->format($format),
            'status' => fake()->numberBetween(0, 1),
        ];
    }
}
