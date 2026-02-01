<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardGameRegistration extends Model
{
    use HasFactory;

    protected $table = 'board_game_registrations';

    protected $fillable = [
        'sport',
        'student_name',
        'student_id',
        'email',
        'phone',
        'year_of_study',
        'course',
        'experience_level',
        'preferred_style',
        'tournament_experience',
        'availability',
        'emergency_contact',
    ];
}
