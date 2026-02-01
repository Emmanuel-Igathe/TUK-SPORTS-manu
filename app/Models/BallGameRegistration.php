<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BallGameRegistration extends Model
{
    use HasFactory;

    protected $table = 'ball_game_registrations';
    
    protected $fillable = [
        'name',
        'student_id',
        'sport',
        'email',
        'phone',
        'year',
        'course',
        'experience',
        'position_role',
    ];
}
