<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->words(2, true);
        
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'icon' => fake()->randomElement(['📚', '🎯', '💡', '🌟', '🔬', '🎨']),
            'color' => fake()->hexColor(),
            'order' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}