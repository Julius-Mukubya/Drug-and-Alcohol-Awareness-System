<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reported_by',
        'incident_type',
        'description',
        'location',
        'incident_date',
        'severity',
        'status',
        'is_anonymous',
        'assigned_to',
        'admin_notes',
        'resolution',
        'resolved_at',
        'attachments',
    ];

    protected $casts = [
            'incident_date' => 'datetime',
            'resolved_at' => 'datetime',
            'is_anonymous' => 'boolean',
            'attachments' => 'array',
        ];

    // Relationships
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeResolved($query)
    {
        return $query->where('status', 'resolved');
    }

    public function scopeBySeverity($query, $severity)
    {
        return $query->where('severity', $severity);
    }

    // Methods
    public function getStatusBadgeAttribute()
    {
        switch($this->status) {
            case 'pending':
                return ['text' => 'Pending', 'color' => 'yellow'];
            case 'investigating':
                return ['text' => 'Investigating', 'color' => 'blue'];
            case 'resolved':
                return ['text' => 'Resolved', 'color' => 'green'];
            case 'closed':
                return ['text' => 'Closed', 'color' => 'gray'];
            default:
                return ['text' => 'Unknown', 'color' => 'gray'];
        }
    }

    public function getSeverityBadgeAttribute()
    {
        switch($this->severity) {
            case 'low':
                return ['text' => 'Low', 'color' => 'green'];
            case 'medium':
                return ['text' => 'Medium', 'color' => 'yellow'];
            case 'high':
                return ['text' => 'High', 'color' => 'orange'];
            case 'critical':
                return ['text' => 'Critical', 'color' => 'red'];
            default:
                return ['text' => 'Unknown', 'color' => 'gray'];
        }
    }

    public function getReporterNameAttribute()
    {
        return $this->is_anonymous ? 'Anonymous' : ($this->reporter ? $this->reporter->name : 'Unknown');
    }
}
