<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThrowingGameRegistration extends Model
{
    use HasFactory;

    protected $table = 'throwing_game_registrations';

    protected $fillable = [
        'sport',
        'student_name',
        'student_id',
        'email',
        'phone',
        'year_of_study',
        'course',
        'experience_level',
        'preferred_event',
        'personal_best',
        'training_goals',
        'medical_conditions',
        'emergency_contact',
        'waiver_accepted',
    ];
}
