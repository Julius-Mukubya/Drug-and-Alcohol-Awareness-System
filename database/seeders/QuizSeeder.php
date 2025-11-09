<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        // Create quizzes with questions using factory
        Quiz::factory()->count(10)->withQuestions(5)->create();
    }
}