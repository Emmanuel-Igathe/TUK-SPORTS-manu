<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MartialArt extends Model
{
    use HasFactory;

    protected $table = 'martial_arts';

    protected $fillable = [
        'name',
        'image_url',
        'total_students',
        'head_instructor',
        'assistant_instructors',
        'year_integrated',
        'gold_medals',
        'silver_medals',
        'bronze_medals',
    ];
}
