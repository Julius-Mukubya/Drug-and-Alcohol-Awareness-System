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
            'incident_type' => $this->faker->randomElement(['Substance Abuse', 'Violence', 'Harassment', 'Other']),
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->randomElement(['Main Campus', 'Library', 'Hostel', 'Parking Lot']),
            'incident_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'severity' => $this->faker->randomElement(['low', 'medium', 'high', 'critical']),
            'status' => $this->faker->randomElement(['pending', 'investigating', 'resolved']),
            'is_anonymous' => $this->faker->boolean(40),
        ];
    }
}
