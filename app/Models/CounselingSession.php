<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CounselingSession extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'counselor_id',
        'subject',
        'description',
        'status',
        'priority',
        'is_anonymous',
        'scheduled_at',
        'started_at',
        'completed_at',
        'outcome_notes',
        'counselor_notes',
        'rating',
        'feedback',
    ];

    protected $casts = [
            'is_anonymous' => 'boolean',
            'scheduled_at' => 'datetime',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
            'rating' => 'integer',
        ];

    // Relationships
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function counselor()
    {
        return $this->belongsTo(User::class, 'counselor_id');
    }

    public function messages()
    {
        return $this->hasMany(CounselingMessage::class, 'session_id')->orderBy('created_at');
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    // Methods
    public function unreadMessagesCount($userId)
    {
        return $this->messages()
            ->where('sender_id', '!=', $userId)
            ->where('is_read', false)
            ->count();
    }

    public function getStatusBadgeAttribute()
    {
        switch($this->status) {
            case 'pending':
                return ['text' => 'Pending', 'color' => 'yellow'];
            case 'active':
                return ['text' => 'Active', 'color' => 'blue'];
            case 'completed':
                return ['text' => 'Completed', 'color' => 'green'];
            case 'cancelled':
                return ['text' => 'Cancelled', 'color' => 'red'];
            default:
                return ['text' => 'Unknown', 'color' => 'gray'];
        }
    }

    public function getPriorityBadgeAttribute()
    {
        switch($this->priority) {
            case 'low':
                return ['text' => 'Low', 'color' => 'gray'];
            case 'medium':
                return ['text' => 'Medium', 'color' => 'blue'];
            case 'high':
                return ['text' => 'High', 'color' => 'orange'];
            case 'urgent':
                return ['text' => 'Urgent', 'color' => 'red'];
            default:
                return ['text' => 'Normal', 'color' => 'gray'];
        }
    }
}
