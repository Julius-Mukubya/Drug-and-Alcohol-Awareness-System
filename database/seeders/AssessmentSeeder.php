<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;
use App\Models\AssessmentQuestion;

class AssessmentSeeder extends Seeder
{
    public function run(): void
    {
        // Skip if assessments already exist
        if (Assessment::count() > 0) {
            return;
        }

        // AUDIT Assessment
        $audit = new Assessment();
        $audit->name = 'AUDIT';
        $audit->full_name = 'Alcohol Use Disorders Identification Test';
        $audit->description = 'A 10-question screening tool to assess alcohol consumption patterns.';
        $audit->type = 'audit';
        $audit->scoring_guidelines = json_encode(['low_risk_threshold' => 0, 'medium_risk_threshold' => 8, 'high_risk_threshold' => 16, 'max_score' => 40]);
        $audit->is_active = true;
        $audit->save();

        $auditQuestions = [
            ['question' => 'How often do you have a drink containing alcohol?', 'options' => [
                ['text' => 'Never', 'score' => 0], ['text' => 'Monthly or less', 'score' => 1], ['text' => '2-4 times a month', 'score' => 2], ['text' => '2-3 times a week', 'score' => 3], ['text' => '4 or more times a week', 'score' => 4]
            ]],
            ['question' => 'How many standard drinks do you have on a typical day?', 'options' => [
                ['text' => '1 or 2', 'score' => 0], ['text' => '3 or 4', 'score' => 1], ['text' => '5 or 6', 'score' => 2], ['text' => '7 to 9', 'score' => 3], ['text' => '10 or more', 'score' => 4]
            ]],
            ['question' => 'How often do you have six or more drinks on one occasion?', 'options' => [
                ['text' => 'Never', 'score' => 0], ['text' => 'Less than monthly', 'score' => 1], ['text' => 'Monthly', 'score' => 2], ['text' => 'Weekly', 'score' => 3], ['text' => 'Daily or almost daily', 'score' => 4]
            ]],
        ];

        foreach ($auditQuestions as $index => $q) {
            $question = new AssessmentQuestion();
            $question->assessment_id = $audit->id;
            $question->question = $q['question'];
            $question->options = json_encode($q['options']);
            $question->order = $index + 1;
            $question->save();
        }

        // DUDIT Assessment
        $dudit = new Assessment();
        $dudit->name = 'DUDIT';
        $dudit->full_name = 'Drug Use Disorders Identification Test';
        $dudit->description = 'An 11-item screening tool to identify drug-related problems.';
        $dudit->type = 'dudit';
        $dudit->scoring_guidelines = json_encode(['low_risk_threshold' => 0, 'medium_risk_threshold' => 6, 'high_risk_threshold' => 25, 'max_score' => 44]);
        $dudit->is_active = true;
        $dudit->save();

        $duditQuestions = [
            ['question' => 'How often do you use drugs other than alcohol?', 'options' => [
                ['text' => 'Never', 'score' => 0], ['text' => 'Once a month or less', 'score' => 1], ['text' => '2-4 times a month', 'score' => 2], ['text' => '2-3 times a week', 'score' => 3], ['text' => '4 times a week or more', 'score' => 4]
            ]],
            ['question' => 'Do you use more than one type of drug on the same occasion?', 'options' => [
                ['text' => 'Never', 'score' => 0], ['text' => 'Once a month or less', 'score' => 1], ['text' => '2-4 times a month', 'score' => 2], ['text' => '2-3 times a week', 'score' => 3], ['text' => '4 times a week or more', 'score' => 4]
            ]],
        ];

        foreach ($duditQuestions as $index => $q) {
            $question = new AssessmentQuestion();
            $question->assessment_id = $dudit->id;
            $question->question = $q['question'];
            $question->options = json_encode($q['options']);
            $question->order = $index + 1;
            $question->save();
        }
    }
}