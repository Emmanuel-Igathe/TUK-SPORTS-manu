<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThrowingGame extends Model
{
    use HasFactory;

    protected $table = 'throwing_games';

    protected $fillable = [
        'name',
        'image_url',
        'total_athletes',
        'head_coach',
        'assistant_coaches',
        'year_integrated',
        'gold_medals',
        'silver_medals',
        'bronze_medals',
    ];
}
