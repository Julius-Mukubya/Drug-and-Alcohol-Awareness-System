<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', 'student')->inRandomOrder()->first()->id ?? User::factory(),
            'type' => fake()->randomElement(['suggestion', 'complaint', 'compliment', 'bug_report']),
            'subject' => fake()->sentence(),
            'message' => fake()->paragraph(),
            'rating' => fake()->optional()->numberBetween(1, 5),
            'is_anonymous' => fake()->boolean(30),
            'status' => fake()->randomElement(['pending', 'reviewed', 'resolved']),
        ];
    }
}