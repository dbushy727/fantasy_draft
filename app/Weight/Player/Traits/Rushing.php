<?php

namespace App\Weight\Player\Traits;

trait Rushing
{
    /**
     * Calculates the total points for rushing yards
     *
     * This currenlty uses the league rule of 10 yards per point
     *
     * @return float
     */
    public function rushYardsWeight()
    {
        return $this->player_position->rush_yards / 10;
    }

    /**
     * Calculates the total points for a rushing touchdown
     *
     * This currently uses the league rule of 6 points per rushing touchdown
     *
     * @return float
     */
    public function rushTouchdownsWeight()
    {
        return $this->player_position->rush_touchdowns * 6;
    }

    /**
     * Calculates extra bonus for how many carries
     *
     * This is to add weight for players who get more opportunities
     *
     * @return float
     */
    public function carriesWeight()
    {
        return $this->player_position->carries / 5;
    }
}
