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

    protected function casts(): array
    {
        return [
            'incident_date' => 'datetime',
            'resolved_at' => 'datetime',
            'is_anonymous' => 'boolean',
            'attachments' => 'array',
        ];
    }

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
        return match($this->status) {
            'pending' => ['text' => 'Pending', 'color' => 'yellow'],
            'investigating' => ['text' => 'Investigating', 'color' => 'blue'],
            'resolved' => ['text' => 'Resolved', 'color' => 'green'],
            'closed' => ['text' => 'Closed', 'color' => 'gray'],
            default => ['text' => 'Unknown', 'color' => 'gray'],
        };
    }

    public function getSeverityBadgeAttribute()
    {
        return match($this->severity) {
            'low' => ['text' => 'Low', 'color' => 'green'],
            'medium' => ['text' => 'Medium', 'color' => 'yellow'],
            'high' => ['text' => 'High', 'color' => 'orange'],
            'critical' => ['text' => 'Critical', 'color' => 'red'],
            default => ['text' => 'Unknown', 'color' => 'gray'],
        };
    }

    public function getReporterNameAttribute()
    {
        return $this->is_anonymous ? 'Anonymous' : $this->reporter?->name;
    }
}