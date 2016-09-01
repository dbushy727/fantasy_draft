<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuarterBack extends PlayerPosition
{
    protected $fillable = [
        'player_id',
        'completions',
        'pass_attempts',
        'pass_yards',
        'pass_touchdowns',
        'interceptions',
        'rating',
        'carries',
        'rush_yards',
        'rush_touchdowns',
    ];
}
