<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'full_name',
        'description',
        'type',
        'scoring_guidelines',
        'is_active',
    ];

    protected $casts = [
            'scoring_guidelines' => 'array',
            'is_active' => 'boolean',
        ];

    // Relationships
    public function questions()
    {
        return $this->hasMany(AssessmentQuestion::class)->orderBy('order');
    }

    public function attempts()
    {
        return $this->hasMany(AssessmentAttempt::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Methods
    public function calculateRiskLevel($totalScore)
    {
        $guidelines = $this->scoring_guidelines;
        
        if ($totalScore >= $guidelines['high_risk_threshold']) {
            return 'high';
        } elseif ($totalScore >= $guidelines['medium_risk_threshold']) {
            return 'medium';
        }
        
        return 'low';
    }
}
