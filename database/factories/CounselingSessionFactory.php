<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CounselingSessionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => User::where('role', 'student')->inRandomOrder()->first()->id ?? User::factory(),
            'counselor_id' => User::where('role', 'counselor')->inRandomOrder()->first()->id ?? User::factory()->counselor(),
            'subject' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['pending', 'active', 'completed']),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'is_anonymous' => fake()->boolean(50),
            'scheduled_at' => fake()->optional()->dateTimeBetween('now', '+1 week'),
        ];
    }
}