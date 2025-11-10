<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Alcohol Awareness', 'description' => 'Information about alcohol abuse, effects, and prevention', 'icon' => '🍺', 'color' => '#EF4444', 'order' => 1],
            ['name' => 'Drug Prevention', 'description' => 'Educational content on drug abuse and prevention strategies', 'icon' => '💊', 'color' => '#F59E0B', 'order' => 2],
            ['name' => 'Mental Health', 'description' => 'Mental health awareness and support resources', 'icon' => '🧠', 'color' => '#8B5CF6', 'order' => 3],
            ['name' => 'Healthy Living', 'description' => 'Tips for maintaining a healthy lifestyle', 'icon' => '🌱', 'color' => '#10B981', 'order' => 4],
            ['name' => 'Peer Pressure', 'description' => 'Dealing with peer pressure and making good decisions', 'icon' => '👥', 'color' => '#3B82F6', 'order' => 5],
            ['name' => 'Recovery & Support', 'description' => 'Resources for recovery and ongoing support', 'icon' => '💚', 'color' => '#22C55E', 'order' => 6],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($category['name'])],
                $category
            );
        }
    }
}