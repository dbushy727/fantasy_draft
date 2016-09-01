<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerPosition extends Player
{
    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }
}
