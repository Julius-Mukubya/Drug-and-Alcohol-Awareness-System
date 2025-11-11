@extends('layouts.student')

@section('title', 'Assessments - Student')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Mental Health Assessments</h2>
    <p class="text-gray-500 dark:text-gray-400">Take self-assessments to understand your mental health</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Stress Assessment</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Evaluate your current stress levels</p>
        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:opacity-90">Take Assessment</button>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Anxiety Assessment</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Check your anxiety levels</p>
        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:opacity-90">Take Assessment</button>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Depression Screening</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Screen for depression symptoms</p>
        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:opacity-90">Take Assessment</button>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Well-being Check</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Assess your overall well-being</p>
        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:opacity-90">Take Assessment</button>
    </div>
</div>
@endsection
