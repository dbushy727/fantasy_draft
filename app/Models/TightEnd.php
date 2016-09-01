<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TightEnd extends PlayerPosition
{
    protected $fillable = [
        'player_id',
        'targets',
        'receptions',
        'reception_yards',
        'reception_touchdowns',
        'longest_reception',
        'carries',
        'rush_yards',
        'rush_touchdowns',
        'fumbles',
        'fumbles_lost',
    ];
}
