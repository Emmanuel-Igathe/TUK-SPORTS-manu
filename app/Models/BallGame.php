<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class BallGame extends Model
{
    use HasFactory;

    protected $table = 'ball_games';

    protected $fillable = [
        'name',
        'image_url',
        'total_players',
        'head_coach',
        'assistant_coaches',
        'year_integrated',
        'wins',
        'losses',
        'draws',
    ];
}
