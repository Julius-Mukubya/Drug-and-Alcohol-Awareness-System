<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'created_by',
        'title',
        'description',
        'content',
        'banner_image',
        'type',
        'start_date',
        'end_date',
        'location',
        'max_participants',
        'status',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'is_featured' => 'boolean',
            'max_participants' => 'integer',
        ];
    }

    // Relationships
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function participants()
    {
        return $this->hasMany(CampaignParticipant::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Methods
    public function isFull()
    {
        if (!$this->max_participants) {
            return false;
        }

        return $this->participants()->where('status', 'registered')->count() >= $this->max_participants;
    }

    public function isUserRegistered($userId)
    {
        return $this->participants()->where('user_id', $userId)->exists();
    }

    public function participantsCount()
    {
        return $this->participants()->where('status', 'registered')->count();
    }

    public function attendedCount()
    {
        return $this->participants()->where('status', 'attended')->count();
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'draft' => ['text' => 'Draft', 'color' => 'gray'],
            'active' => ['text' => 'Active', 'color' => 'green'],
            'completed' => ['text' => 'Completed', 'color' => 'blue'],
            'cancelled' => ['text' => 'Cancelled', 'color' => 'red'],
            default => ['text' => 'Unknown', 'color' => 'gray'],
        };
    }

    public function getBannerUrlAttribute()
    {
        return $this->banner_image 
            ? asset('storage/' . $this->banner_image) 
            : asset('images/default-campaign.png');
    }
}