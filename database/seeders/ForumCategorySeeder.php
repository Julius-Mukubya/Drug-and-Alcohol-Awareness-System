<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForumCategory;

class ForumCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'General Discussion', 'description' => 'General topics about student life', 'icon' => '💬', 'color' => '#3B82F6', 'order' => 1],
            ['name' => 'Success Stories', 'description' => 'Share your recovery and success stories', 'icon' => '🌟', 'color' => '#22C55E', 'order' => 2],
            ['name' => 'Support & Encouragement', 'description' => 'Get and give support to fellow students', 'icon' => '🤝', 'color' => '#8B5CF6', 'order' => 3],
            ['name' => 'Questions & Answers', 'description' => 'Ask questions and get answers', 'icon' => '❓', 'color' => '#F59E0B', 'order' => 4],
        ];

        foreach ($categories as $category) {
            ForumCategory::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($category['name'])],
                $category
            );
        }
    }
}