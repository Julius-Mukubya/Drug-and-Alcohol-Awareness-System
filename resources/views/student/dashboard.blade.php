@extends('layouts.student')

@section('title', 'Student Dashboard - MUBS Awareness')
@section('page-title', 'Dashboard')

@section('content')
<!-- Welcome Section -->
<div class="flex flex-wrap justify-between items-center gap-3 mb-8">
    <div class="flex flex-col gap-1">
        <p class="text-gray-900 dark:text-white text-3xl font-bold tracking-tight">Welcome back, {{ auth()->user()->name }}!</p>
        <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal">Here's your learning progress and activities.</p>
    </div>
</div>

<!-- Personal Progress Overview -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Learning Progress -->
    <div class="lg:col-span-2 bg-gradient-to-r from-primary to-blue-600 rounded-xl p-6 text-white">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-semibold">Learning Progress</h3>
                <p class="text-blue-100 text-sm">{{ $data['learning_progress'] }}% of available quizzes completed</p>
            </div>
            <div class="bg-white/20 rounded-lg p-3">
                <span class="material-symbols-outlined text-2xl">school</span>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="text-center">
                <p class="text-2xl font-bold">{{ $data['quizzes_completed'] }}</p>
                <p class="text-blue-100 text-sm">Completed</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold">{{ round($data['average_quiz_score'], 1) }}%</p>
                <p class="text-blue-100 text-sm">Avg Score</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold">{{ $data['streak_days'] }}</p>
                <p class="text-blue-100 text-sm">Day Streak</p>
            </div>
        </div>
        <div class="mt-4">
            <div class="w-full bg-white/20 rounded-full h-2">
                <div class="bg-white h-2 rounded-full" style="width: {{ $data['learning_progress'] }}%"></div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="space-y-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Study Time</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ floor($data['total_study_time'] / 60) }}h {{ $data['total_study_time'] % 60 }}m</p>
                </div>
                <span class="material-symbols-outlined text-blue-500 text-2xl">schedule</span>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">This Week</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $data['this_week_activity'] }}</p>
                </div>
                <span class="material-symbols-outlined text-green-500 text-2xl">trending_up</span>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Categories</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $data['quiz_categories_completed'] }}</p>
                </div>
                <span class="material-symbols-outlined text-purple-500 text-2xl">category</span>
            </div>
        </div>
    </div>
</div>

<!-- Detailed Stats -->
<div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-4 mb-8">
    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 text-center">
        <span class="material-symbols-outlined text-green-500 text-2xl mb-2">quiz</span>
        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['quizzes_passed'] }}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">Passed</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 text-center">
        <span class="material-symbols-outlined text-blue-500 text-2xl mb-2">assessment</span>
        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['assessments_taken'] }}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">Assessments</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 text-center">
        <span class="material-symbols-outlined text-purple-500 text-2xl mb-2">forum</span>
        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['forum_posts'] }}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">Posts</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 text-center">
        <span class="material-symbols-outlined text-orange-500 text-2xl mb-2">visibility</span>
        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['contents_viewed'] }}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">Content</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 text-center">
        <span class="material-symbols-outlined text-teal-500 text-2xl mb-2">support_agent</span>
        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['counseling_sessions'] }}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">Sessions</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 text-center">
        <span class="material-symbols-outlined text-pink-500 text-2xl mb-2">bookmark</span>
        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['bookmarks_count'] }}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">Bookmarks</p>
    </div>
</div>

<!-- Achievements -->
@if(count($data['recent_achievements']) > 0)
<div class="bg-gradient-to-r from-yellow-400 to-orange-500 rounded-xl p-6 text-white mb-8">
    <div class="flex items-center mb-4">
        <span class="material-symbols-outlined text-2xl mr-3">emoji_events</span>
        <h3 class="text-lg font-semibold">Recent Achievements</h3>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach($data['recent_achievements'] as $achievement)
        <div class="bg-white/20 rounded-lg p-4">
            <div class="flex items-center">
                <span class="material-symbols-outlined text-2xl mr-3">{{ $achievement['icon'] }}</span>
                <div>
                    <p class="font-semibold">{{ $achievement['title'] }}</p>
                    <p class="text-sm text-yellow-100">{{ $achievement['description'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<!-- Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
        <div class="space-y-3">
            <a href="{{ route('student.assessments.index') }}" class="w-full bg-primary text-white text-sm font-medium py-3 px-4 rounded-lg hover:opacity-90 flex items-center gap-2">
                <span class="material-symbols-outlined">psychology</span>
                Take Assessment
            </a>
            <a href="{{ route('student.quizzes.index') }}" class="w-full bg-blue-600 text-white text-sm font-medium py-3 px-4 rounded-lg hover:opacity-90 flex items-center gap-2">
                <span class="material-symbols-outlined">quiz</span>
                Start Quiz
            </a>
            <a href="{{ route('student.counseling.create') }}" class="w-full bg-green-600 text-white text-sm font-medium py-3 px-4 rounded-lg hover:opacity-90 flex items-center gap-2">
                <span class="material-symbols-outlined">support_agent</span>
                Request Counseling
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Recent Content</h3>
        <div class="space-y-3">
            @forelse($data['recent_contents'] as $content)
            <div class="border-b border-gray-100 dark:border-gray-700 pb-3 last:border-b-0">
                <a href="{{ route('content.show', $content) }}" class="block">
                    <p class="text-sm font-medium text-gray-900 dark:text-white hover:text-primary">{{ Str::limit($content->title, 40) }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $content->category->name }} • {{ $content->reading_time }}min read</p>
                </a>
            </div>
            @empty
            <p class="text-sm text-gray-500 dark:text-gray-400">No recent content available</p>
            @endforelse
        </div>
        <a href="{{ route('content.index') }}" class="text-sm text-primary hover:underline mt-3 block">View all content →</a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Available Quizzes</h3>
        <div class="space-y-3">
            @forelse($data['available_quizzes'] as $quiz)
            <div class="border-b border-gray-100 dark:border-gray-700 pb-3 last:border-b-0">
                <a href="{{ route('student.quizzes.show', $quiz) }}" class="block">
                    <p class="text-sm font-medium text-gray-900 dark:text-white hover:text-primary">{{ Str::limit($quiz->title, 40) }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $quiz->questions_count }} questions • {{ ucfirst($quiz->difficulty) }}</p>
                </a>
            </div>
            @empty
            <p class="text-sm text-gray-500 dark:text-gray-400">No quizzes available</p>
            @endforelse
        </div>
        <a href="{{ route('student.quizzes.index') }}" class="text-sm text-primary hover:underline mt-3 block">View all quizzes →</a>
    </div>
</div>

<!-- Performance Analytics -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Weekly Activity Chart -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Weekly Activity</h3>
        <div class="h-64">
            <canvas id="weeklyActivityChart"></canvas>
        </div>
    </div>

    <!-- Quiz Performance Trend -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quiz Performance</h3>
        <div class="h-64">
            <canvas id="quizPerformanceChart"></canvas>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">My Quiz Attempts</h3>
        <div class="space-y-3">
            @forelse($data['my_attempts'] as $attempt)
            <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700 last:border-b-0">
                <div>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $attempt->quiz->title }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $attempt->created_at->diffForHumans() }}</p>
                </div>
                <div class="text-right">
                    @if($attempt->completed_at)
                        <span class="px-2 py-1 text-xs font-medium {{ $attempt->passed ? 'text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-300' : 'text-red-800 bg-red-100 dark:bg-red-900 dark:text-red-300' }} rounded-full">
                            {{ $attempt->score }}%
                        </span>
                    @else
                        <span class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                            In Progress
                        </span>
                    @endif
                </div>
            </div>
            @empty
            <p class="text-sm text-gray-500 dark:text-gray-400">No quiz attempts yet</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Counseling Sessions</h3>
        <div class="space-y-3">
            @forelse($data['counseling_sessions'] as $session)
            <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700 last:border-b-0">
                <div>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $session->subject }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        @if($session->counselor)
                            with {{ $session->counselor->name }}
                        @else
                            Waiting for counselor
                        @endif
                    </p>
                </div>
                <span class="px-2 py-1 text-xs font-medium 
                    @if($session->status === 'pending') text-yellow-800 bg-yellow-100 dark:bg-yellow-900 dark:text-yellow-300
                    @elseif($session->status === 'active') text-blue-800 bg-blue-100 dark:bg-blue-900 dark:text-blue-300
                    @elseif($session->status === 'completed') text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-300
                    @else text-gray-800 bg-gray-100 dark:bg-gray-900 dark:text-gray-300
                    @endif rounded-full">
                    {{ ucfirst($session->status) }}
                </span>
            </div>
            @empty
            <p class="text-sm text-gray-500 dark:text-gray-400">No counseling sessions</p>
            @endforelse
        </div>
        <a href="{{ route('student.counseling.index') }}" class="text-sm text-primary hover:underline mt-3 block">View all sessions →</a>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Weekly Activity Chart
const weeklyActivityCtx = document.getElementById('weeklyActivityChart').getContext('2d');
const weeklyActivityChart = new Chart(weeklyActivityCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode(array_column($data['weekly_quiz_activity'], 'date')) !!},
        datasets: [{
            label: 'Quiz Attempts',
            data: {!! json_encode(array_column($data['weekly_quiz_activity'], 'count')) !!},
            borderColor: '#10b77f',
            backgroundColor: 'rgba(16, 183, 127, 0.1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4
        }, {
            label: 'Content Views',
            data: {!! json_encode(array_column($data['weekly_content_views'], 'count')) !!},
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.1)'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});

// Quiz Performance Chart
const quizPerformanceCtx = document.getElementById('quizPerformanceChart').getContext('2d');
const performanceData = {!! json_encode($data['quiz_performance_trend']) !!};
const quizPerformanceChart = new Chart(quizPerformanceCtx, {
    type: 'line',
    data: {
        labels: performanceData.map((item, index) => `Quiz ${index + 1}`),
        datasets: [{
            label: 'Score %',
            data: performanceData.map(item => item.score),
            borderColor: '#f59e0b',
            backgroundColor: 'rgba(245, 158, 11, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#f59e0b',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 5
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
                max: 100,
                grid: {
                    color: 'rgba(0, 0, 0, 0.1)'
                },
                ticks: {
                    callback: function(value) {
                        return value + '%';
                    }
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});
</script>
@endpush