<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kicker extends PlayerPosition
{
    protected $fillable = [
        'player_id',
        'field_goals_made',
        'field_goals_attempts',
        'longest_field_goal',
        'extra_points_made',
        'extra_points_attempts',
    ];
}
