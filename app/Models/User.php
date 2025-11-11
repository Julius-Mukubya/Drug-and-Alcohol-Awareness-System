<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'registration_number',
        'phone',
        'avatar',
        'role',
        'is_active',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    // Relationships
    public function contents()
    {
        return $this->hasMany(EducationalContent::class, 'created_by');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'created_by');
    }

    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    public function assessmentAttempts()
    {
        return $this->hasMany(AssessmentAttempt::class);
    }

    public function counselingSessions()
    {
        return $this->hasMany(CounselingSession::class, 'student_id');
    }

    public function counselingAsProvider()
    {
        return $this->hasMany(CounselingSession::class, 'counselor_id');
    }

    public function counselingMessages()
    {
        return $this->hasMany(CounselingMessage::class, 'sender_id');
    }

    public function forumPosts()
    {
        return $this->hasMany(ForumPost::class);
    }

    public function forumComments()
    {
        return $this->hasMany(ForumComment::class);
    }

    public function incidents()
    {
        return $this->hasMany(Incident::class, 'reported_by');
    }

    public function assignedIncidents()
    {
        return $this->hasMany(Incident::class, 'assigned_to');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'created_by');
    }

    public function campaignParticipations()
    {
        return $this->hasMany(CampaignParticipant::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function contentViews()
    {
        return $this->hasMany(ContentView::class);
    }

    public function upvotes()
    {
        return $this->hasMany(ForumUpvote::class);
    }

    // Helper Methods
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isCounselor()
    {
        return $this->role === 'counselor';
    }

    public function isStudent()
    {
        return $this->role === 'student';
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function unreadNotifications()
    {
        return $this->notifications()->where('is_read', false);
    }

    public function unreadNotificationsCount()
    {
        return $this->unreadNotifications()->count();
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar 
            ? asset('storage/' . $this->avatar) 
            : asset('images/default-avatar.png');
    }
}

