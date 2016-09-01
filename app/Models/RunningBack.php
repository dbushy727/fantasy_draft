<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RunningBack extends PlayerPosition
{
    protected $fillable = [
        'player_id',
        'carries',
        'rush_yards',
        'rush_touchdowns',
        'targets',
        'receptions',
        'reception_yards',
        'reception_touchdowns',
        'fumbles',
        'fumbles_lost',
    ];
}
