@extends('layouts.admin')

@section('title', 'Admin Dashboard - MUBS Awareness')

@section('content')
<!-- PageHeading -->
<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
    <div class="flex flex-col gap-1">
        <p class="text-gray-900 dark:text-white text-2xl sm:text-3xl font-bold tracking-tight">Admin Dashboard</p>
        <p class="text-gray-500 dark:text-gray-400 text-sm sm:text-base">Welcome back, {{ auth()->user()->name }}!</p>
    </div>
    <a href="{{ route('admin.reports.index') }}" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white text-sm font-semibold px-6 py-3 rounded-xl flex items-center justify-center gap-2 hover:shadow-lg hover:shadow-emerald-500/30 transition-all duration-200 w-full sm:w-auto">
        <span class="material-symbols-outlined text-lg">summarize</span>
        View Reports
    </a>
</div>

<!-- Key Metrics Overview -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm font-medium">Total Students</p>
                <p class="text-3xl font-bold">{{ $data['total_students'] }}</p>
                <div class="flex items-center mt-2">
                    <span class="material-symbols-outlined text-sm mr-1">trending_up</span>
                    <span class="text-sm">+{{ $data['user_growth'] }}% this month</span>
                </div>
            </div>
            <div class="bg-white/20 rounded-lg p-3">
                <span class="material-symbols-outlined text-2xl">school</span>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm font-medium">Active Sessions</p>
                <p class="text-3xl font-bold">{{ $data['active_sessions'] }}</p>
                <div class="flex items-center mt-2">
                    <span class="material-symbols-outlined text-sm mr-1">support_agent</span>
                    <span class="text-sm">{{ $data['this_month_sessions'] }} this month</span>
                </div>
            </div>
            <div class="bg-white/20 rounded-lg p-3">
                <span class="material-symbols-outlined text-2xl">psychology</span>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm font-medium">Content Views</p>
                <p class="text-3xl font-bold">{{ number_format($data['total_content_views']) }}</p>
                <div class="flex items-center mt-2">
                    <span class="material-symbols-outlined text-sm mr-1">visibility</span>
                    <span class="text-sm">{{ $data['published_contents'] }} published</span>
                </div>
            </div>
            <div class="bg-white/20 rounded-lg p-3">
                <span class="material-symbols-outlined text-2xl">library_books</span>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-100 text-sm font-medium">Quiz Attempts</p>
                <p class="text-3xl font-bold">{{ $data['total_quiz_attempts'] }}</p>
                <div class="flex items-center mt-2">
                    <span class="material-symbols-outlined text-sm mr-1">quiz</span>
                    <span class="text-sm">{{ $data['completed_quiz_attempts'] }} completed</span>
                </div>
            </div>
            <div class="bg-white/20 rounded-lg p-3">
                <span class="material-symbols-outlined text-2xl">assignment</span>
            </div>
        </div>
    </div>
</div>

<!-- Secondary Stats -->
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 dark:text-gray-400 text-xs font-medium">Daily Active</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['daily_active_users'] }}</p>
            </div>
            <span class="material-symbols-outlined text-blue-500">today</span>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 dark:text-gray-400 text-xs font-medium">Pending Incidents</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['pending_incidents'] }}</p>
            </div>
            <span class="material-symbols-outlined text-red-500">warning</span>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 dark:text-gray-400 text-xs font-medium">Forum Posts</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['this_week_posts'] }}</p>
            </div>
            <span class="material-symbols-outlined text-green-500">forum</span>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 dark:text-gray-400 text-xs font-medium">Counselors</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['total_counselors'] }}</p>
            </div>
            <span class="material-symbols-outlined text-purple-500">person</span>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 dark:text-gray-400 text-xs font-medium">Campaigns</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['active_campaigns'] }}</p>
            </div>
            <span class="material-symbols-outlined text-indigo-500">campaign</span>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 dark:text-gray-400 text-xs font-medium">Assessments</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['this_month_assessments'] }}</p>
            </div>
            <span class="material-symbols-outlined text-teal-500">assessment</span>
        </div>
    </div>
</div>

<!-- Analytics Charts -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- User Registration Trend -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">User Registrations</h3>
            <span class="text-sm text-gray-500 dark:text-gray-400">Last 7 days</span>
        </div>
        <div class="h-64">
            <canvas id="userRegistrationChart"></canvas>
        </div>
    </div>

    <!-- Content Engagement -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Content Views</h3>
            <span class="text-sm text-gray-500 dark:text-gray-400">Weekly trend</span>
        </div>
        <div class="h-64">
            <canvas id="contentViewsChart"></canvas>
        </div>
    </div>
</div>

<!-- Platform Health Overview -->
<div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
    <!-- System Health -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">System Health</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600 dark:text-gray-400">Active Users</span>
                <div class="flex items-center">
                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $data['weekly_active_users'] }}</span>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600 dark:text-gray-400">Response Rate</span>
                <div class="flex items-center">
                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                    <span class="text-sm font-medium text-gray-900 dark:text-white">98.5%</span>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600 dark:text-gray-400">Incidents</span>
                <div class="flex items-center">
                    <div class="w-2 h-2 {{ $data['critical_incidents'] > 0 ? 'bg-red-500' : 'bg-green-500' }} rounded-full mr-2"></div>
                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $data['critical_incidents'] }} Critical</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Engagement Metrics -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Engagement</h3>
        <div class="space-y-4">
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600 dark:text-gray-400">Quiz Completion</span>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $data['total_quiz_attempts'] > 0 ? round(($data['completed_quiz_attempts'] / $data['total_quiz_attempts']) * 100, 1) : 0 }}%</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $data['total_quiz_attempts'] > 0 ? round(($data['completed_quiz_attempts'] / $data['total_quiz_attempts']) * 100, 1) : 0 }}%"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600 dark:text-gray-400">Content Published</span>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $data['total_contents'] > 0 ? round(($data['published_contents'] / $data['total_contents']) * 100, 1) : 0 }}%</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ $data['total_contents'] > 0 ? round(($data['published_contents'] / $data['total_contents']) * 100, 1) : 0 }}%"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600 dark:text-gray-400">Session Success</span>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $data['total_sessions'] > 0 ? round(($data['completed_sessions'] / $data['total_sessions']) * 100, 1) : 0 }}%</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-purple-500 h-2 rounded-full" style="width: {{ $data['total_sessions'] > 0 ? round(($data['completed_sessions'] / $data['total_sessions']) * 100, 1) : 0 }}%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Recent Activity</h3>
        <div class="space-y-3">
            @foreach($data['recent_sessions']->take(4) as $session)
            <div class="flex items-center space-x-3">
                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-900 dark:text-white truncate">New counseling session</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $session->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
        <div class="space-y-3">
            <a href="{{ route('admin.contents.create') }}" class="w-full bg-primary text-white text-sm font-medium py-2 px-3 rounded-lg hover:opacity-90 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">add</span>
                Create Content
            </a>
            <a href="{{ route('admin.quizzes.create') }}" class="w-full bg-blue-600 text-white text-sm font-medium py-2 px-3 rounded-lg hover:opacity-90 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">quiz</span>
                Create Quiz
            </a>
            <a href="{{ route('admin.users.create') }}" class="w-full bg-green-600 text-white text-sm font-medium py-2 px-3 rounded-lg hover:opacity-90 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">person_add</span>
                Add User
            </a>
            <a href="{{ route('admin.campaigns.create') }}" class="w-full bg-purple-600 text-white text-sm font-medium py-2 px-3 rounded-lg hover:opacity-90 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">campaign</span>
                New Campaign
            </a>
        </div>
    </div>
</div>

<!-- Data Tables & Management -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <div class="xl:col-span-2 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent User Registrations</h3>
            <a class="text-sm font-medium text-primary hover:underline" href="{{ route('admin.users.index') }}">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 dark:text-gray-300 uppercase bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3" scope="col">Name</th>
                        <th class="px-6 py-3" scope="col">Email</th>
                        <th class="px-6 py-3" scope="col">Date</th>
                        <th class="px-6 py-3" scope="col">Role</th>
                        <th class="px-6 py-3" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data['recent_users'] as $user)
                    <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-primary hover:underline">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No recent users</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>    <di
v class="space-y-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Content Management</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Oversee all articles, videos, and informational content.</p>
            <div class="space-y-2">
                @forelse($data['recent_contents']->take(3) as $content)
                <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700 last:border-b-0">
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ Str::limit($content->title, 30) }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $content->created_at->diffForHumans() }}</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium {{ $content->is_published ? 'text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-300' : 'text-yellow-800 bg-yellow-100 dark:bg-yellow-900 dark:text-yellow-300' }} rounded-full">
                        {{ $content->is_published ? 'Published' : 'Draft' }}
                    </span>
                </div>
                @empty
                <p class="text-sm text-gray-500 dark:text-gray-400">No recent content</p>
                @endforelse
            </div>
            <a href="{{ route('admin.contents.index') }}" class="w-full bg-primary/20 text-primary dark:bg-primary/30 dark:text-primary text-sm font-medium py-2 rounded-lg hover:bg-primary/30 dark:hover:bg-primary/40 mt-4 block text-center">Manage Content</a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Pending Incidents</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Review and manage reported incidents.</p>
            <div class="space-y-2">
                @forelse($data['pending_incidents_list'] as $incident)
                <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700 last:border-b-0">
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $incident->incident_type }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $incident->created_at->diffForHumans() }}</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full dark:bg-red-900 dark:text-red-300">
                        {{ ucfirst($incident->severity) }}
                    </span>
                </div>
                @empty
                <p class="text-sm text-gray-500 dark:text-gray-400">No pending incidents</p>
                @endforelse
            </div>
            <a href="{{ route('admin.incidents.index') }}" class="w-full bg-red-50 text-red-600 dark:bg-red-900/30 dark:text-red-400 text-sm font-medium py-2 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/50 mt-4 block text-center">Review Incidents</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// User Registration Chart
const userRegCtx = document.getElementById('userRegistrationChart').getContext('2d');
const userRegistrationChart = new Chart(userRegCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode(array_column($data['weekly_registrations'], 'date')) !!},
        datasets: [{
            label: 'New Registrations',
            data: {!! json_encode(array_column($data['weekly_registrations'], 'count')) !!},
            borderColor: '#10b77f',
            backgroundColor: 'rgba(16, 183, 127, 0.1)',
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
                display: false
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

// Content Views Chart
const contentViewsCtx = document.getElementById('contentViewsChart').getContext('2d');
const contentViewsChart = new Chart(contentViewsCtx, {
    type: 'bar',
    data: {
        labels: {!! json_encode(array_column($data['weekly_content_views'], 'date')) !!},
        datasets: [{
            label: 'Content Views',
            data: {!! json_encode(array_column($data['weekly_content_views'], 'count')) !!},
            backgroundColor: 'rgba(59, 130, 246, 0.8)',
            borderColor: '#3b82f6',
            borderWidth: 1,
            borderRadius: 4
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
</script>
@endpush