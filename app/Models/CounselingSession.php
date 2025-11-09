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

    protected function casts(): array
    {
        return [
            'is_anonymous' => 'boolean',
            'scheduled_at' => 'datetime',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
            'rating' => 'integer',
        ];
    }

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
        return match($this->status) {
            'pending' => ['text' => 'Pending', 'color' => 'yellow'],
            'active' => ['text' => 'Active', 'color' => 'blue'],
            'completed' => ['text' => 'Completed', 'color' => 'green'],
            'cancelled' => ['text' => 'Cancelled', 'color' => 'red'],
            default => ['text' => 'Unknown', 'color' => 'gray'],
        };
    }

    public function getPriorityBadgeAttribute()
    {
        return match($this->priority) {
            'low' => ['text' => 'Low', 'color' => 'gray'],
            'medium' => ['text' => 'Medium', 'color' => 'blue'],
            'high' => ['text' => 'High', 'color' => 'orange'],
            'urgent' => ['text' => 'Urgent', 'color' => 'red'],
            default => ['text' => 'Normal', 'color' => 'gray'],
        };
    }
}