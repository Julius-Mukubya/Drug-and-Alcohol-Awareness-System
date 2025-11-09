<?php

namespace Database\Factories;

use App\Models\{ForumPost, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumCommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => ForumPost::inRandomOrder()->first()->id ?? ForumPost::factory(),
            'user_id' => User::where('role', 'student')->inRandomOrder()->first()->id ?? User::factory(),
            'comment' => fake()->paragraph(),
            'is_anonymous' => fake()->boolean(20),
            'upvotes' => fake()->numberBetween(0, 20),
        ];
    }
}