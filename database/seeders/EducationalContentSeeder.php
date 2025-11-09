<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationalContent;

class EducationalContentSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample content using factory
        EducationalContent::factory()->count(20)->published()->create();
        EducationalContent::factory()->count(5)->draft()->create();
    }
}