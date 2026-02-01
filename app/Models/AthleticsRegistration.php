<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AthleticsRegistration extends Model
{
    use HasFactory;

    protected $table = 'athletics_registrations';

    protected $fillable = [
        'sport',
        'name',
        'student_id',
        'email',
        'phone',
        'year',
        'course',
        'experience',
        'preferred_event',
        'personal_best',
        'medical_notes',
        'emergency_contact',
    ];
}
