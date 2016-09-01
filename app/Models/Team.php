<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'rank',
        'name',
        'wins',
        'losses',
        'points_for',
        'points_against',
        'abbr',
        'offense',
        'defense',
    ];

    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }

    public function quarter_backs()
    {
        return $this->hasManyThrough('App\Models\QuarterBack', 'App\Models\Player');
    }

    public function running_backs()
    {
        return $this->hasManyThrough('App\Models\RunningBack', 'App\Models\Player');
    }

    public function wide_receivers()
    {
        return $this->hasManyThrough('App\Models\WideReceivers', 'App\Models\Player');
    }

    public function tight_ends()
    {
        return $this->hasManyThrough('App\Models\TightEnd', 'App\Models\Player');
    }

    public function kickers()
    {
        return $this->hasManyThrough('App\Models\Kicker', 'App\Models\Player');
    }

    public function defense()
    {
        return $this->hasOne('App\Models\Defense');
    }
}
