<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'subject',
        'message',
        'rating',
        'is_anonymous',
        'status',
        'admin_response',
        'responded_at',
    ];

    protected function casts(): array
    {
        return [
            'is_anonymous' => 'boolean',
            'rating' => 'integer',
            'responded_at' => 'datetime',
        ];
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeReviewed($query)
    {
        return $query->where('status', 'reviewed');
    }

    // Methods
    public function getTypeBadgeAttribute()
    {
        return match($this->type) {
            'suggestion' => ['text' => 'Suggestion', 'color' => 'blue'],
            'complaint' => ['text' => 'Complaint', 'color' => 'red'],
            'compliment' => ['text' => 'Compliment', 'color' => 'green'],
            'bug_report' => ['text' => 'Bug Report', 'color' => 'orange'],
            default => ['text' => 'Unknown', 'color' => 'gray'],
        };
    }

    public function getSubmitterNameAttribute()
    {
        return $this->is_anonymous ? 'Anonymous' : $this->user?->name;
    }
}