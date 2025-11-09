<?php

namespace Database\Factories;

use App\Models\{ForumCategory, User, ForumComment};
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumPostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => ForumCategory::inRandomOrder()->first()->id ?? ForumCategory::factory(),
            'user_id' => User::where('role', 'student')->inRandomOrder()->first()->id ?? User::factory(),
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(3, true),
            'is_anonymous' => fake()->boolean(20),
            'is_pinned' => false,
            'is_locked' => false,
            'views' => fake()->numberBetween(0, 200),
            'upvotes' => fake()->numberBetween(0, 50),
        ];
    }

    public function withComments(int $count = 3): static
    {
        return $this->afterCreating(function ($post) use ($count) {
            ForumComment::factory()->count($count)->create(['post_id' => $post->id]);
        });
    }
}