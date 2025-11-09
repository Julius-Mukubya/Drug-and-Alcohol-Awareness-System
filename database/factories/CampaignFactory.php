<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    public function definition(): array
    {
        return [
            'created_by' => User::where('role', 'admin')->inRandomOrder()->first()->id ?? User::factory()->admin(),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'content' => fake()->paragraphs(4, true),
            'type' => fake()->randomElement(['awareness', 'event', 'workshop', 'webinar']),
            'start_date' => now()->addDays(fake()->numberBetween(1, 30)),
            'end_date' => now()->addDays(fake()->numberBetween(31, 60)),
            'max_participants' => fake()->randomElement([50, 100, 200, null]),
            'status' => 'active',
            'is_featured' => fake()->boolean(30),
        ];
    }

    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
            'start_date' => now()->subDays(5),
            'end_date' => now()->addDays(10),
        ]);
    }

    public function upcoming(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
            'start_date' => now()->addDays(5),
            'end_date' => now()->addDays(15),
        ]);
    }
}