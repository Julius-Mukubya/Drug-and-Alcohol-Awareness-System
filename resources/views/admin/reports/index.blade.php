@extends('layouts.admin')

@section('title', 'Reports - Admin')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Reports & Analytics</h2>
    <p class="text-gray-500 dark:text-gray-400">View system reports and analytics</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">User Report</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">User registration and activity statistics</p>
        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:opacity-90">Generate Report</button>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Content Report</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Content performance and engagement</p>
        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:opacity-90">Generate Report</button>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Quiz Report</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Quiz attempts and performance</p>
        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:opacity-90">Generate Report</button>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Counseling Report</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Counseling sessions and outcomes</p>
        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:opacity-90">Generate Report</button>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Incident Report</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Incident tracking and resolution</p>
        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:opacity-90">Generate Report</button>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Campaign Report</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Campaign participation and impact</p>
        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:opacity-90">Generate Report</button>
    </div>
</div>
@endsection
