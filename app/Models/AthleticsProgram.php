<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AthleticsProgram extends Model
{
    use HasFactory;

    protected $table = 'athletics_programs';

    protected $fillable = [
        'name',
        'image_url',
        'head_coach',
        'assistant_coaches',
        'year_integrated',
        'gold_medals',
        'silver_medals',
        'bronze_medals',
        'base_athlete_count',
        'active',
    ];
}
