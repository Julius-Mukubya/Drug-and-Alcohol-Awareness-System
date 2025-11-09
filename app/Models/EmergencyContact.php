<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organization',
        'phone',
        'email',
        'description',
        'address',
        'type',
        'is_24_7',
        'is_active',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'is_24_7' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scope247($query)
    {
        return $query->where('is_24_7', true);
    }

    // Methods
    public function getTypeBadgeAttribute()
    {
        return match($this->type) {
            'hotline' => ['text' => 'Hotline', 'color' => 'red'],
            'hospital' => ['text' => 'Hospital', 'color' => 'blue'],
            'counseling' => ['text' => 'Counseling', 'color' => 'green'],
            'police' => ['text' => 'Police', 'color' => 'purple'],
            'other' => ['text' => 'Other', 'color' => 'gray'],
            default => ['text' => 'Unknown', 'color' => 'gray'],
        };
    }
}