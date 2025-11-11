@extends('layouts.admin')

@section('title', 'Reports & Analytics - Admin')

@section('content')
<!-- Header -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Reports & Analytics</h1>
        <p class="text-gray-500 dark:text-gray-400 mt-1">Comprehensive system insights and data exports</p>
    </div>
    <div class="flex gap-3">
        <a href="{{ route('admin.reports.export', ['type' => 'users']) }}" class="bg-emerald-600 text-white px-4 py-2 rounded-lg hover:bg-emerald-700 flex items-center gap-2 font-medium">
            <span class="material-symbols-outlined text-sm">download</span>
            Export Users
        </a>
        <a href="{{ route('admin.reports.export', ['type' => 'quiz_attempts']) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center gap-2 font-medium">
            <span class="material-symbols-outlined text-sm">download</span>
            Export Quizzes
        </a>
    </div>
</div>

<!-- Key Metrics -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Total Users -->
    <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white shadow-lg shadow-emerald-500/30">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">group</span>
            </div>
            <span class="text-emerald-100 text-sm">Total</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ number_format($stats['total_users']) }}</h3>
        <p class="text-emerald-100 text-sm">Registered Users</p>
        <div class="mt-3 pt-3 border-t border-white/20 text-xs">
            <span>{{ $stats['total_students'] }} Students • {{ $stats['total_counselors'] }} Counselors</span>
        </div>
    </div>

    <!-- Content Stats -->
    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg shadow-blue-500/30">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">article</span>
            </div>
            <span class="text-blue-100 text-sm">Published</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ number_format($stats['published_contents']) }}</h3>
        <p class="text-blue-100 text-sm">Educational Content</p>
        <div class="mt-3 pt-3 border-t border-white/20 text-xs">
            <span>{{ number_format($stats['total_views']) }} Total Views</span>
        </div>
    </div>

    <!-- Quiz Stats -->
    <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white shadow-lg shadow-purple-500/30">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">quiz</span>
            </div>
            <span class="text-purple-100 text-sm">Pass Rate</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ number_format($stats['pass_rate'], 1) }}%</h3>
        <p class="text-purple-100 text-sm">Quiz Performance</p>
        <div class="mt-3 pt-3 border-t border-white/20 text-xs">
            <span>{{ number_format($stats['total_quiz_attempts']) }} Attempts</span>
        </div>
    </div>

    <!-- Counseling Stats -->
    <div class="bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl p-6 text-white shadow-lg shadow-orange-500/30">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">support_agent</span>
            </div>
            <span class="text-orange-100 text-sm">Active</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ number_format($stats['active_sessions']) }}</h3>
        <p class="text-orange-100 text-sm">Counseling Sessions</p>
        <div class="mt-3 pt-3 border-t border-white/20 text-xs">
            <span>{{ $stats['pending_sessions'] }} Pending • {{ $stats['completed_sessions'] }} Completed</span>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- User Growth Chart -->
    <div class="bg-gradient-to-br from-white to-emerald-50/30 dark:from-gray-800 dark:to-emerald-950/20 rounded-2xl border border-emerald-100 dark:border-emerald-900/30 p-6 shadow-lg shadow-emerald-500/5">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">trending_up</span>
            User Growth (Last 6 Months)
        </h3>
        <div style="height: 300px; position: relative;">
            <canvas id="userGrowthChart"></canvas>
        </div>
    </div>

    <!-- Quiz Attempts Chart -->
    <div class="bg-gradient-to-br from-white to-blue-50/30 dark:from-gray-800 dark:to-blue-950/20 rounded-2xl border border-blue-100 dark:border-blue-900/30 p-6 shadow-lg shadow-blue-500/5">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-blue-600">quiz</span>
            Quiz Attempts (Last 6 Months)
        </h3>
        <div style="height: 300px; position: relative;">
            <canvas id="quizAttemptsChart"></canvas>
        </div>
    </div>
</div>

<!-- Detailed Statistics -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- User Activity -->
    <div class="bg-gradient-to-br from-white to-emerald-50/30 dark:from-gray-800 dark:to-emerald-950/20 rounded-2xl border border-emerald-100 dark:border-emerald-900/30 p-6 shadow-lg shadow-emerald-500/5">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">person_check</span>
            User Activity
        </h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-900/50 rounded-lg">
                <span class="text-sm text-gray-600 dark:text-gray-400">Today</span>
                <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $stats['active_users_today'] }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-900/50 rounded-lg">
                <span class="text-sm text-gray-600 dark:text-gray-400">This Week</span>
                <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $stats['active_users_week'] }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-900/50 rounded-lg">
                <span class="text-sm text-gray-600 dark:text-gray-400">This Month</span>
                <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $stats['active_users_month'] }}</span>
            </div>
        </div>
    </div>

    <!-- Assessment Risk Levels -->
    <div class="bg-gradient-to-br from-white to-purple-50/30 dark:from-gray-800 dark:to-purple-950/20 rounded-2xl border border-purple-100 dark:border-purple-900/30 p-6 shadow-lg shadow-purple-500/5">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-purple-600">psychology</span>
            Assessment Risk Levels
        </h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800">
                <span class="text-sm text-green-700 dark:text-green-300 flex items-center gap-2">
                    <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                    Low Risk
                </span>
                <span class="text-lg font-bold text-green-700 dark:text-green-300">{{ $stats['low_risk_count'] }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg border border-yellow-200 dark:border-yellow-800">
                <span class="text-sm text-yellow-700 dark:text-yellow-300 flex items-center gap-2">
                    <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                    Medium Risk
                </span>
                <span class="text-lg font-bold text-yellow-700 dark:text-yellow-300">{{ $stats['medium_risk_count'] }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-red-50 dark:bg-red-900/20 rounded-lg border border-red-200 dark:border-red-800">
                <span class="text-sm text-red-700 dark:text-red-300 flex items-center gap-2">
                    <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                    High Risk
                </span>
                <span class="text-lg font-bold text-red-700 dark:text-red-300">{{ $stats['high_risk_count'] }}</span>
            </div>
        </div>
    </div>

    <!-- Incident Status -->
    <div class="bg-gradient-to-br from-white to-orange-50/30 dark:from-gray-800 dark:to-orange-950/20 rounded-2xl border border-orange-100 dark:border-orange-900/30 p-6 shadow-lg shadow-orange-500/5">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-orange-600">report</span>
            Incident Reports
        </h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-900/50 rounded-lg">
                <span class="text-sm text-gray-600 dark:text-gray-400">Total</span>
                <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $stats['total_incidents'] }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg">
                <span class="text-sm text-yellow-700 dark:text-yellow-300">Pending</span>
                <span class="text-lg font-bold text-yellow-700 dark:text-yellow-300">{{ $stats['pending_incidents'] }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-green-50 dark:bg-green-900/20 rounded-lg">
                <span class="text-sm text-green-700 dark:text-green-300">Resolved</span>
                <span class="text-lg font-bold text-green-700 dark:text-green-300">{{ $stats['resolved_incidents'] }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Export Options -->
<div class="bg-gradient-to-br from-white to-gray-50/30 dark:from-gray-800 dark:to-gray-950/20 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 shadow-lg">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
        <span class="material-symbols-outlined text-gray-600 dark:text-gray-400">file_download</span>
        Export Reports
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('admin.reports.export', ['type' => 'users']) }}" class="p-4 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-lg hover:bg-emerald-100 dark:hover:bg-emerald-900/30 transition-colors">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-emerald-600 dark:text-emerald-400 text-2xl">group</span>
                <div>
                    <p class="font-semibold text-gray-900 dark:text-white">Users Report</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Export all user data</p>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.reports.export', ['type' => 'quiz_attempts']) }}" class="p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-blue-600 dark:text-blue-400 text-2xl">quiz</span>
                <div>
                    <p class="font-semibold text-gray-900 dark:text-white">Quiz Attempts</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Export quiz performance</p>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.reports.export', ['type' => 'incidents']) }}" class="p-4 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/30 transition-colors">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-orange-600 dark:text-orange-400 text-2xl">report</span>
                <div>
                    <p class="font-semibold text-gray-900 dark:text-white">Incidents Report</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Export incident data</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
// User Growth Chart
const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
new Chart(userGrowthCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode($monthlyUsers->pluck('month')) !!},
        datasets: [{
            label: 'New Users',
            data: {!! json_encode($monthlyUsers->pluck('count')) !!},
            borderColor: '#10b77f',
            backgroundColor: 'rgba(16, 183, 127, 0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});

// Quiz Attempts Chart
const quizAttemptsCtx = document.getElementById('quizAttemptsChart').getContext('2d');
new Chart(quizAttemptsCtx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($monthlyQuizAttempts->pluck('month')) !!},
        datasets: [{
            label: 'Quiz Attempts',
            data: {!! json_encode($monthlyQuizAttempts->pluck('count')) !!},
            backgroundColor: 'rgba(59, 130, 246, 0.8)',
            borderColor: '#3b82f6',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});
</script>
@endpush
