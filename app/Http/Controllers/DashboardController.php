<?php

namespace App\Http\Controllers;

use App\Models\{
    EducationalContent, 
    Quiz, 
    QuizAttempt,
    AssessmentAttempt,
    CounselingSession,
    CounselingMessage,
    Incident, 
    User, 
    Campaign,
    CampaignParticipant,
    ForumPost,
    ForumComment,
    ForumCategory,
    ContentView,
    Notification
};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Get role-specific data
        switch($user->role) {
            case 'student':
                $data = $this->getStudentData($user);
                $view = 'student.dashboard';
                break;
            case 'counselor':
                $data = $this->getCounselorData($user);
                $view = 'counselor.dashboard';
                break;
            case 'admin':
                $data = $this->getAdminData();
                $view = 'admin.dashboard';
                break;
            default:
                $data = [];
                $view = 'dashboard.index';
        }

        return view($view, compact('user', 'data'));
    }

    public function getStudentData($user)
    {
        return [
            // Personal Statistics
            'quizzes_completed' => $user->quizAttempts()->completed()->count(),
            'quizzes_passed' => $user->quizAttempts()->completed()->where('passed', true)->count(),
            'average_quiz_score' => $user->quizAttempts()->completed()->avg('score') ?? 0,
            'assessments_taken' => $user->assessmentAttempts()->count(),
            'forum_posts' => $user->forumPosts()->count(),
            'forum_comments' => $user->forumComments()->count(),
            'contents_viewed' => $user->contentViews()->count(),
            'total_study_time' => $user->quizAttempts()->sum('time_spent') ?? 0, // in minutes
            
            // Counseling & Support
            'counseling_sessions' => $user->counselingSessions()->count(),
            'active_counseling' => $user->counselingSessions()->active()->count(),
            'completed_counseling' => $user->counselingSessions()->where('status', 'completed')->count(),
            'unread_messages' => $user->notifications()->unread()->count(),
            
            // Engagement Metrics
            'streak_days' => $this->calculateStudyStreak($user),
            'this_week_activity' => $user->quizAttempts()->where('created_at', '>=', now()->subWeek())->count(),
            'this_month_activity' => $user->quizAttempts()->where('created_at', '>=', now()->subMonth())->count(),
            'bookmarks_count' => $user->bookmarks()->count(),
            
            // Progress & Achievements
            'learning_progress' => $this->calculateLearningProgress($user),
            'quiz_categories_completed' => $this->getCompletedCategories($user),
            'recent_achievements' => $this->getRecentAchievements($user),
            
            // Content & Resources
            'recent_contents' => EducationalContent::published()->latest()->take(6)->get(),
            'recommended_contents' => $this->getRecommendedContent($user),
            'available_quizzes' => Quiz::active()->withCount('questions')->latest()->take(5)->get(),
            'my_attempts' => $user->quizAttempts()->with('quiz')->latest()->take(5)->get(),
            'my_sessions' => $user->counselingSessions()->with('counselor')->latest()->take(5)->get(),
            'upcoming_campaigns' => Campaign::active()->latest()->take(3)->get(),
            
            // Weekly Activity Data for Charts
            'weekly_quiz_activity' => $this->getUserWeeklyActivity($user, 'quiz_attempts'),
            'weekly_content_views' => $this->getUserWeeklyActivity($user, 'content_views'),
            'quiz_performance_trend' => $this->getQuizPerformanceTrend($user),
        ];
    }

    private function calculateStudyStreak($user)
    {
        $streak = 0;
        $currentDate = now()->startOfDay();
        
        while (true) {
            $hasActivity = $user->quizAttempts()
                ->whereDate('created_at', $currentDate)
                ->exists() || 
                $user->contentViews()
                ->whereDate('created_at', $currentDate)
                ->exists();
                
            if (!$hasActivity) {
                break;
            }
            
            $streak++;
            $currentDate->subDay();
            
            if ($streak > 365) break; // Prevent infinite loop
        }
        
        return $streak;
    }

    private function calculateLearningProgress($user)
    {
        $totalQuizzes = Quiz::active()->count();
        $completedQuizzes = $user->quizAttempts()->completed()->distinct('quiz_id')->count();
        
        return $totalQuizzes > 0 ? round(($completedQuizzes / $totalQuizzes) * 100, 1) : 0;
    }

    private function getCompletedCategories($user)
    {
        return $user->quizAttempts()
            ->completed()
            ->join('quizzes', 'quiz_attempts.quiz_id', '=', 'quizzes.id')
            ->join('categories', 'quizzes.category_id', '=', 'categories.id')
            ->distinct('categories.id')
            ->count();
    }

    private function getRecentAchievements($user)
    {
        $achievements = [];
        
        // Check for recent milestones
        $recentAttempts = $user->quizAttempts()->completed()->where('created_at', '>=', now()->subWeek())->count();
        if ($recentAttempts >= 5) {
            $achievements[] = ['title' => 'Quiz Master', 'description' => 'Completed 5 quizzes this week', 'icon' => 'quiz'];
        }
        
        $perfectScores = $user->quizAttempts()->completed()->where('score', 100)->where('created_at', '>=', now()->subWeek())->count();
        if ($perfectScores > 0) {
            $achievements[] = ['title' => 'Perfect Score', 'description' => 'Achieved 100% on a quiz', 'icon' => 'star'];
        }
        
        return $achievements;
    }

    private function getRecommendedContent($user)
    {
        // Get content based on user's quiz categories
        $userCategories = $user->quizAttempts()
            ->join('quizzes', 'quiz_attempts.quiz_id', '=', 'quizzes.id')
            ->pluck('quizzes.category_id')
            ->unique();
            
        return EducationalContent::published()
            ->whereIn('category_id', $userCategories)
            ->latest()
            ->take(4)
            ->get();
    }

    private function getUserWeeklyActivity($user, $type)
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            
            if ($type === 'quiz_attempts') {
                $count = $user->quizAttempts()->whereDate('created_at', $date)->count();
            } else {
                $count = $user->contentViews()->whereDate('created_at', $date)->count();
            }
            
            $data[] = [
                'date' => $date->format('M d'),
                'count' => $count
            ];
        }
        return $data;
    }

    private function getQuizPerformanceTrend($user)
    {
        return $user->quizAttempts()
            ->completed()
            ->latest()
            ->take(10)
            ->get(['score', 'created_at'])
            ->reverse()
            ->values();
    }

    public function getCounselorData($user)
    {
        return [
            // Session Statistics
            'total_sessions' => $user->counselingAsProvider()->count(),
            'active_sessions' => $user->counselingAsProvider()->active()->count(),
            'completed_sessions' => $user->counselingAsProvider()->where('status', 'completed')->count(),
            'this_month_completed' => $user->counselingAsProvider()->where('status', 'completed')->whereMonth('completed_at', now()->month)->count(),
            'pending_requests' => CounselingSession::pending()->count(),
            'my_pending_count' => CounselingSession::pending()->where('counselor_id', null)->count(),
            
            // Performance Metrics
            'average_session_rating' => $user->counselingAsProvider()->where('status', 'completed')->avg('rating') ?? 0,
            'success_rate' => $this->calculateCounselorSuccessRate($user),
            'response_time' => $this->calculateAverageResponseTime($user),
            'this_week_sessions' => $user->counselingAsProvider()->where('created_at', '>=', now()->subWeek())->count(),
            
            // Workload Distribution
            'sessions_by_priority' => $this->getSessionsByPriority($user),
            'sessions_by_status' => $this->getSessionsByStatus($user),
            'weekly_session_trend' => $this->getCounselorWeeklyTrend($user),
            
            // Student Engagement
            'unique_students_helped' => $user->counselingAsProvider()->distinct('student_id')->count(),
            'repeat_students' => $this->getRepeatStudents($user),
            'student_satisfaction' => $this->getStudentSatisfaction($user),
            
            // Recent Data
            'my_pending' => CounselingSession::pending()->latest()->take(5)->get(),
            'my_active' => $user->counselingAsProvider()->active()->with('student')->latest()->get(),
            'recent_completed' => $user->counselingAsProvider()->where('status', 'completed')->with('student')->latest()->take(5)->get(),
            
            // Messages & Communication
            'unread_messages' => $this->getUnreadMessagesCount($user),
            'total_messages_sent' => CounselingMessage::where('sender_id', $user->id)->count(),
        ];
    }

    private function calculateCounselorSuccessRate($user)
    {
        $completed = $user->counselingAsProvider()->where('status', 'completed')->count();
        $total = $user->counselingAsProvider()->whereIn('status', ['completed', 'cancelled'])->count();
        
        return $total > 0 ? round(($completed / $total) * 100, 1) : 0;
    }

    private function calculateAverageResponseTime($user)
    {
        // This would calculate average time between session request and first response
        // For now, return a placeholder
        return rand(2, 24); // hours
    }

    private function getSessionsByPriority($user)
    {
        return [
            'low' => $user->counselingAsProvider()->where('priority', 'low')->count(),
            'medium' => $user->counselingAsProvider()->where('priority', 'medium')->count(),
            'high' => $user->counselingAsProvider()->where('priority', 'high')->count(),
            'urgent' => $user->counselingAsProvider()->where('priority', 'urgent')->count(),
        ];
    }

    private function getSessionsByStatus($user)
    {
        return [
            'pending' => $user->counselingAsProvider()->where('status', 'pending')->count(),
            'active' => $user->counselingAsProvider()->where('status', 'active')->count(),
            'completed' => $user->counselingAsProvider()->where('status', 'completed')->count(),
            'cancelled' => $user->counselingAsProvider()->where('status', 'cancelled')->count(),
        ];
    }

    private function getCounselorWeeklyTrend($user)
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $count = $user->counselingAsProvider()->whereDate('created_at', $date)->count();
            $data[] = [
                'date' => $date->format('M d'),
                'count' => $count
            ];
        }
        return $data;
    }

    private function getRepeatStudents($user)
    {
        return $user->counselingAsProvider()
            ->select('student_id')
            ->groupBy('student_id')
            ->havingRaw('COUNT(*) > 1')
            ->count();
    }

    private function getStudentSatisfaction($user)
    {
        $ratings = $user->counselingAsProvider()
            ->where('status', 'completed')
            ->whereNotNull('rating')
            ->pluck('rating');
            
        if ($ratings->count() === 0) return 0;
        
        return round($ratings->avg(), 1);
    }

    private function getUnreadMessagesCount($user)
    {
        return CounselingMessage::whereHas('session', function($query) use ($user) {
            $query->where('counselor_id', $user->id);
        })->where('sender_id', '!=', $user->id)->where('is_read', false)->count();
    }

    public function getAdminData()
    {
        return [
            // User Statistics
            'total_students' => User::where('role', 'student')->count(),
            'total_counselors' => User::where('role', 'counselor')->count(),
            'total_admins' => User::where('role', 'admin')->count(),
            'daily_active_users' => User::where('last_login_at', '>=', now()->subDay())->count(),
            'weekly_active_users' => User::where('last_login_at', '>=', now()->subWeek())->count(),
            'monthly_active_users' => User::where('last_login_at', '>=', now()->subMonth())->count(),
            
            // Content Statistics
            'total_contents' => EducationalContent::count(),
            'published_contents' => EducationalContent::published()->count(),
            'draft_contents' => EducationalContent::where('is_published', false)->count(),
            'featured_contents' => EducationalContent::featured()->count(),
            'total_content_views' => EducationalContent::sum('views'),
            
            // Quiz & Assessment Statistics
            'total_quizzes' => Quiz::count(),
            'active_quizzes' => Quiz::active()->count(),
            'total_quiz_attempts' => QuizAttempt::count(),
            'completed_quiz_attempts' => QuizAttempt::completed()->count(),
            'total_assessments' => AssessmentAttempt::count(),
            'this_month_assessments' => AssessmentAttempt::whereMonth('created_at', now()->month)->count(),
            
            // Counseling Statistics
            'active_sessions' => CounselingSession::active()->count(),
            'pending_sessions' => CounselingSession::pending()->count(),
            'completed_sessions' => CounselingSession::where('status', 'completed')->count(),
            'total_sessions' => CounselingSession::count(),
            'this_month_sessions' => CounselingSession::whereMonth('created_at', now()->month)->count(),
            
            // Incident & Safety Statistics
            'pending_incidents' => Incident::pending()->count(),
            'resolved_incidents' => Incident::where('status', 'resolved')->count(),
            'critical_incidents' => Incident::where('severity', 'critical')->count(),
            'total_incidents' => Incident::count(),
            
            // Forum & Community Statistics
            'total_forum_posts' => ForumPost::count(),
            'this_week_posts' => ForumPost::where('created_at', '>=', now()->subWeek())->count(),
            'total_forum_comments' => ForumComment::count(),
            'active_forum_categories' => ForumCategory::whereHas('posts')->count(),
            
            // Campaign Statistics
            'active_campaigns' => Campaign::active()->count(),
            'total_campaigns' => Campaign::count(),
            'campaign_participants' => CampaignParticipant::count(),
            
            // Growth Statistics (last 30 days vs previous 30 days)
            'user_growth' => $this->calculateGrowth(User::class, 'student'),
            'content_growth' => $this->calculateGrowth(EducationalContent::class),
            'session_growth' => $this->calculateGrowth(CounselingSession::class),
            
            // Recent Data
            'recent_users' => User::where('role', 'student')->latest()->take(10)->get(),
            'recent_contents' => EducationalContent::with('author')->latest()->take(5)->get(),
            'pending_incidents_list' => Incident::pending()->with('reporter')->latest()->take(5)->get(),
            'recent_sessions' => CounselingSession::with(['student', 'counselor'])->latest()->take(5)->get(),
            
            // Weekly Activity Data for Charts
            'weekly_registrations' => $this->getWeeklyData(User::class, 'student'),
            'weekly_content_views' => $this->getWeeklyContentViews(),
            'weekly_quiz_attempts' => $this->getWeeklyData(QuizAttempt::class),
            'weekly_sessions' => $this->getWeeklyData(CounselingSession::class),
        ];
    }

    private function calculateGrowth($model, $role = null)
    {
        $query = $model::query();
        if ($role) {
            $query->where('role', $role);
        }
        
        $current = $query->clone()->where('created_at', '>=', now()->subDays(30))->count();
        $previous = $query->clone()->whereBetween('created_at', [now()->subDays(60), now()->subDays(30)])->count();
        
        if ($previous == 0) return $current > 0 ? 100 : 0;
        return round((($current - $previous) / $previous) * 100, 1);
    }

    private function getWeeklyData($model, $role = null)
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $query = $model::whereDate('created_at', $date);
            if ($role) {
                $query->where('role', $role);
            }
            $data[] = [
                'date' => $date->format('M d'),
                'count' => $query->count()
            ];
        }
        return $data;
    }

    private function getWeeklyContentViews()
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $views = ContentView::whereDate('created_at', $date)->count();
            $data[] = [
                'date' => $date->format('M d'),
                'count' => $views
            ];
        }
        return $data;
    }
}