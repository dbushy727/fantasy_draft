<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'team_id',
        'position',
        'name',
        'games_played',
        'total_fantasy',
    ];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
