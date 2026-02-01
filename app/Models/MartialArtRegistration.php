<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MartialArtRegistration extends Model
{
    use HasFactory;

    protected $table = 'martial_art_registrations';

    protected $fillable = [
        'sport',
        'student_name',
        'student_id',
        'email',
        'phone',
        'year_of_study',
        'course',
        'experience_level',
        'belt_rank',
        'training_goals',
        'medical_conditions',
        'emergency_contact',
        'waiver_accepted',
    ];
}
