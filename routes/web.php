<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    DashboardController,
    ContentController,
    CampaignController,
    ProfileController,
    NotificationController
};
use App\Http\Controllers\Student\{
    QuizController as StudentQuizController,
    AssessmentController as StudentAssessmentController,
    CounselingController as StudentCounselingController,
    ForumController as StudentForumController
};
use App\Http\Controllers\Admin\{
    ContentController as AdminContentController,
    UserController as AdminUserController,
    QuizController as AdminQuizController,
    CampaignController as AdminCampaignController,
    IncidentController as AdminIncidentController,
    ReportController as AdminReportController,
    SettingsController as AdminSettingsController
};
use App\Http\Controllers\Counselor\SessionController as CounselorSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Public Content Routes
Route::prefix('content')->name('content.')->group(function () {
    Route::get('/', [ContentController::class, 'index'])->name('index');
    Route::get('/{content}', [ContentController::class, 'show'])->name('show');
});

// Public Campaign Routes
Route::prefix('campaigns')->name('campaigns.')->group(function () {
    Route::get('/', [CampaignController::class, 'index'])->name('index');
    Route::get('/{campaign}', [CampaignController::class, 'show'])->name('show');
    
    Route::middleware('auth')->group(function () {
        Route::post('/{campaign}/register', [CampaignController::class, 'register'])->name('register');
        Route::delete('/{campaign}/unregister', [CampaignController::class, 'unregister'])->name('unregister');
    });
});

// Authenticated Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    // Dashboard Route - redirects based on role
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::patch('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
    
    // Notification Routes
    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('index');
        Route::patch('/{id}/read', [NotificationController::class, 'markAsRead'])->name('read');
        Route::patch('/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('markAllAsRead');
    });
    
    // Student Routes
    Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Quiz Routes
        Route::prefix('quizzes')->name('quizzes.')->group(function () {
            Route::get('/', [StudentQuizController::class, 'index'])->name('index');
            Route::get('/{quiz}', [StudentQuizController::class, 'show'])->name('show');
            Route::post('/{quiz}/start', [StudentQuizController::class, 'start'])->name('start');
            Route::get('/attempt/{attempt}', [StudentQuizController::class, 'take'])->name('take');
            Route::post('/attempt/{attempt}/submit', [StudentQuizController::class, 'submit'])->name('submit');
            Route::get('/attempt/{attempt}/result', [StudentQuizController::class, 'result'])->name('result');
        });
        
        // Assessment Routes
        Route::prefix('assessments')->name('assessments.')->group(function () {
            Route::get('/', [StudentAssessmentController::class, 'index'])->name('index');
            Route::get('/{assessment}', [StudentAssessmentController::class, 'show'])->name('show');
            Route::post('/', [StudentAssessmentController::class, 'store'])->name('store');
            Route::get('/attempt/{attempt}/result', [StudentAssessmentController::class, 'result'])->name('result');
        });
        
        // Counseling Routes
        Route::prefix('counseling')->name('counseling.')->group(function () {
            Route::get('/', [StudentCounselingController::class, 'index'])->name('index');
            Route::get('/create', [StudentCounselingController::class, 'create'])->name('create');
            Route::post('/', [StudentCounselingController::class, 'store'])->name('store');
            Route::get('/{counseling}', [StudentCounselingController::class, 'show'])->name('show');
            Route::post('/{counseling}/message', [StudentCounselingController::class, 'sendMessage'])->name('message');
        });
        
        // Forum Routes
        Route::prefix('forum')->name('forum.')->group(function () {
            Route::get('/', [StudentForumController::class, 'index'])->name('index');
            Route::get('/create', [StudentForumController::class, 'create'])->name('create');
            Route::post('/', [StudentForumController::class, 'store'])->name('store');
            Route::get('/{forum}', [StudentForumController::class, 'show'])->name('show');
            Route::post('/{forum}/comment', [StudentForumController::class, 'storeComment'])->name('comment');
            Route::post('/{forum}/upvote', [StudentForumController::class, 'upvote'])->name('upvote');
        });
    });
    
    // Counselor Routes (accessible by counselors and admins)
    Route::middleware(['auth'])->prefix('counselor')->name('counselor.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::prefix('sessions')->name('sessions.')->group(function () {
            Route::get('/', [CounselorSessionController::class, 'index'])->name('index');
            Route::get('/{session}', [CounselorSessionController::class, 'show'])->name('show');
            Route::post('/{session}/accept', [CounselorSessionController::class, 'accept'])->name('accept');
            Route::post('/{session}/complete', [CounselorSessionController::class, 'complete'])->name('complete');
            Route::post('/{session}/message', [CounselorSessionController::class, 'sendMessage'])->name('message');
        });
    });
    
    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Content Management
        Route::resource('contents', AdminContentController::class);
        
        // User Management
        Route::resource('users', AdminUserController::class);
        
        // Quiz Management
        Route::resource('quizzes', AdminQuizController::class);
        
        // Campaign Management
        Route::resource('campaigns', AdminCampaignController::class);
        
        // Incident Management
        Route::resource('incidents', AdminIncidentController::class)->except(['create', 'store']);
        
        // Reports
        Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/', [AdminReportController::class, 'index'])->name('index');
            Route::get('/export', [AdminReportController::class, 'export'])->name('export');
        });
        
        // Settings
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [AdminSettingsController::class, 'index'])->name('index');
            Route::patch('/update', [AdminSettingsController::class, 'update'])->name('update');
            Route::patch('/email/update', [AdminSettingsController::class, 'updateEmail'])->name('email.update');
            Route::patch('/security/update', [AdminSettingsController::class, 'updateSecurity'])->name('security.update');
            Route::patch('/content/update', [AdminSettingsController::class, 'updateContent'])->name('content.update');
        });
    });
});
