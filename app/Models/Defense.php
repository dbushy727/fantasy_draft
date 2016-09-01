<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Defense extends Team
{
    protected $fillable = [
        'team_id',
        'tackles_for_loss',
        'sacks',
        'interceptions',
        'fumbles_recovered',
        'safeties',
        'defensive_touchdowns',
        'return_touchdowns',
        'points_allowed',
    ];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
