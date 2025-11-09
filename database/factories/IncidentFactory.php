<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'reported_by' => User::where('role', 'student')->inRandomOrder()->first()->id ?? User::factory(),
            'incident_type' => fake()->randomElement(['Substance Abuse', 'Violence', 'Harassment', 'Other']),
            'description' => fake()->paragraph(),
            'location' => fake()->randomElement(['Main Campus', 'Library', 'Hostel', 'Parking Lot']),
            'incident_date' => fake()->dateTimeBetween('-1 month', 'now'),
            'severity' => fake()->randomElement(['low', 'medium', 'high', 'critical']),
            'status' => fake()->randomElement(['pending', 'investigating', 'resolved']),
            'is_anonymous' => fake()->boolean(40),
        ];
    }
}