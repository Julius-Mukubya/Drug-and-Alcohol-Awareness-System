<?php

namespace App\Http\Controllers;

use App\Models\{EducationalContent, Quiz, CounselingSession, Incident, User, Campaign};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $data = match($user->role) {
            'student' => $this->getStudentData($user),
            'counselor' => $this->getCounselorData($user),
            'admin' => $this->getAdminData(),
            default => []
        };

        return view('dashboard.index', compact('user', 'data'));
    }

    private function getStudentData($user)
    {
        return [
            'quizzes_completed' => $user->quizAttempts()->completed()->count(),
            'assessments_taken' => $user->assessmentAttempts()->count(),
            'forum_posts' => $user->forumPosts()->count(),
            'contents_viewed' => $user->contentViews()->count(),
            'recent_contents' => EducationalContent::published()->latest()->take(6)->get(),
            'available_quizzes' => Quiz::active()->withCount('questions')->latest()->take(5)->get(),
            'my_attempts' => $user->quizAttempts()->with('quiz')->latest()->take(5)->get(),
            'counseling_sessions' => $user->counselingSessions()->with('counselor')->latest()->take(5)->get(),
            'unread_messages' => $user->notifications()->unread()->count(),
            'upcoming_campaigns' => Campaign::active()->latest()->take(3)->get(),
        ];
    }

    private function getCounselorData($user)
    {
        return [
            'total_sessions' => $user->counselingAsProvider()->count(),
            'active_sessions' => $user->counselingAsProvider()->active()->count(),
            'completed_sessions' => $user->counselingAsProvider()->completed()->whereMonth('completed_at', now()->month)->count(),
            'pending_requests' => CounselingSession::pending()->count(),
            'my_pending' => CounselingSession::pending()->latest()->take(5)->get(),
            'my_active' => $user->counselingAsProvider()->active()->with('student')->latest()->get(),
            'unread_messages' => 0, // Calculate unread messages across sessions
        ];
    }

    private function getAdminData()
    {
        return [
            'total_students' => User::where('role', 'student')->count(),
            'total_contents' => EducationalContent::count(),
            'active_sessions' => CounselingSession::active()->count(),
            'pending_incidents' => Incident::pending()->count(),
            'total_quizzes' => Quiz::count(),
            'recent_users' => User::where('role', 'student')->latest()->take(10)->get(),
            'recent_contents' => EducationalContent::with('author')->latest()->take(5)->get(),
            'pending_incidents_list' => Incident::pending()->with('reporter')->latest()->take(5)->get(),
            'daily_active_users' => User::where('last_login_at', '>=', now()->subDay())->count(),
            'weekly_active_users' => User::where('last_login_at', '>=', now()->subWeek())->count(),
        ];
    }
}