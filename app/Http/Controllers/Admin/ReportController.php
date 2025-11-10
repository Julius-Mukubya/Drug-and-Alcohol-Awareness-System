<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User, EducationalContent, Quiz, QuizAttempt, AssessmentAttempt, CounselingSession, Incident};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $stats = [
            // User statistics
            'total_users' => User::count(),
            'total_students' => User::where('role', 'student')->count(),
            'total_counselors' => User::where('role', 'counselor')->count(),
            'active_users_today' => User::where('last_login_at', '>=', now()->subDay())->count(),
            'active_users_week' => User::where('last_login_at', '>=', now()->subWeek())->count(),
            'active_users_month' => User::where('last_login_at', '>=', now()->subMonth())->count(),

            // Content statistics
            'total_contents' => EducationalContent::count(),
            'published_contents' => EducationalContent::where('is_published', true)->count(),
            'total_views' => EducationalContent::sum('views'),
            'avg_views' => EducationalContent::avg('views'),

            // Quiz statistics
            'total_quizzes' => Quiz::count(),
            'active_quizzes' => Quiz::where('is_active', true)->count(),
            'total_quiz_attempts' => QuizAttempt::count(),
            'completed_attempts' => QuizAttempt::whereNotNull('completed_at')->count(),
            'avg_quiz_score' => QuizAttempt::whereNotNull('score')->avg('score'),
            'pass_rate' => QuizAttempt::where('passed', true)->count() / max(QuizAttempt::count(), 1) * 100,

            // Assessment statistics
            'total_assessments' => AssessmentAttempt::count(),
            'low_risk_count' => AssessmentAttempt::where('risk_level', 'low')->count(),
            'medium_risk_count' => AssessmentAttempt::where('risk_level', 'medium')->count(),
            'high_risk_count' => AssessmentAttempt::where('risk_level', 'high')->count(),

            // Counseling statistics
            'total_sessions' => CounselingSession::count(),
            'pending_sessions' => CounselingSession::where('status', 'pending')->count(),
            'active_sessions' => CounselingSession::where('status', 'active')->count(),
            'completed_sessions' => CounselingSession::where('status', 'completed')->count(),

            // Incident statistics
            'total_incidents' => Incident::count(),
            'pending_incidents' => Incident::where('status', 'pending')->count(),
            'resolved_incidents' => Incident::where('status', 'resolved')->count(),
        ];

        // Monthly trends
        $monthlyUsers = User::where('created_at', '>=', now()->subMonths(6))
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthlyContents = EducationalContent::where('published_at', '>=', now()->subMonths(6))
            ->select(DB::raw('DATE_FORMAT(published_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthlyQuizAttempts = QuizAttempt::where('created_at', '>=', now()->subMonths(6))
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Top performers
        $topQuizTakers = User::withCount('quizAttempts')
            ->orderBy('quiz_attempts_count', 'desc')
            ->take(10)
            ->get();

        $topContentCreators = User::withCount('contents')
            ->where('role', 'admin')
            ->orderBy('contents_count', 'desc')
            ->take(10)
            ->get();

        return view('admin.reports.index', compact(
            'stats',
            'monthlyUsers',
            'monthlyContents',
            'monthlyQuizAttempts',
            'topQuizTakers',
            'topContentCreators'
        ));
    }

    public function export(Request $request)
    {
        $type = $request->input('type', 'users');

        // Generate CSV export based on type
        $filename = $type . '_report_' . now()->format('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($type) {
            $file = fopen('php://output', 'w');

            switch ($type) {
                case 'users':
                    fputcsv($file, ['Name', 'Email', 'Registration Number', 'Role', 'Status', 'Joined Date']);
                    User::chunk(100, function($users) use ($file) {
                        foreach ($users as $user) {
                            fputcsv($file, [
                                $user->name,
                                $user->email,
                                $user->registration_number,
                                $user->role,
                                $user->is_active ? 'Active' : 'Inactive',
                                $user->created_at->format('Y-m-d'),
                            ]);
                        }
                    });
                    break;

                case 'quiz_attempts':
                    fputcsv($file, ['Student', 'Quiz', 'Score', 'Status', 'Date']);
                    QuizAttempt::with(['user', 'quiz'])->chunk(100, function($attempts) use ($file) {
                        foreach ($attempts as $attempt) {
                            fputcsv($file, [
                                $attempt->user->name,
                                $attempt->quiz->title,
                                $attempt->score . '%',
                                $attempt->passed ? 'Passed' : 'Failed',
                                $attempt->completed_at?->format('Y-m-d'),
                            ]);
                        }
                    });
                    break;

                case 'incidents':
                    fputcsv($file, ['Type', 'Severity', 'Status', 'Reporter', 'Date']);
                    Incident::with('reporter')->chunk(100, function($incidents) use ($file) {
                        foreach ($incidents as $incident) {
                            fputcsv($file, [
                                $incident->incident_type,
                                $incident->severity,
                                $incident->status,
                                $incident->is_anonymous ? 'Anonymous' : $incident->reporter?->name,
                                $incident->created_at->format('Y-m-d'),
                            ]);
                        }
                    });
                    break;
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}