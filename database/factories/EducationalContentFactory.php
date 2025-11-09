<?php

namespace Database\Factories;

use App\Models\{Category, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationalContentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'created_by' => User::where('role', 'admin')->inRandomOrder()->first()->id ?? User::factory()->admin(),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'content' => fake()->paragraphs(5, true),
            'type' => fake()->randomElement(['article', 'video', 'infographic', 'document']),
            'reading_time' => fake()->numberBetween(3, 15),
            'views' => fake()->numberBetween(0, 500),
            'is_published' => true,
            'is_featured' => false,
            'published_at' => now(),
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => ['is_published' => true, 'published_at' => now()]);
    }

    public function draft(): static
    {
        return $this->state(fn (array $attributes) => ['is_published' => false, 'published_at' => null]);
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => ['is_featured' => true]);
    }
}