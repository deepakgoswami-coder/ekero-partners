<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachJobApplication extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'coach_job_applications';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'full_name',
        'email',
        'mobile',
        'current_location',
        'experience_level',
        'primary_skills',
        'about_candidate',
        'cv_path',
        'status',
        'admin_notes',
        'applied_ip',
        'reviewed_at',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'reviewed_at' => 'datetime',
    ];
}
