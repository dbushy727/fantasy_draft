<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class PlayerPosition extends Player
{
    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }

    public function team()
    {
        return $this->player->team;
    }

    public function getNameAttribute()
    {
        return $this->player->name;
    }

    public function getGamesPlayedAttribute()
    {
        return $this->player->games_played;
    }

    public function getTotalFantasyAttribute()
    {
        return $this->player->total_fantasy;
    }

    public function getPositionAttribute()
    {
        return $this->player->position;
    }

    public function getWeightAttribute()
    {
        return app('App\Weight\Player\PositionWeight', [$this])->weight();
    }
}
