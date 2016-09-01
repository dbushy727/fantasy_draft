<?php

namespace App\Weight\Player\Traits;

trait Passing
{
    /**
     * Calculates total points for the amount of yards thrown
     * This currently uses the league rule of 25 yards per point
     *
     * @return float
     */
    public function passYardsWeight()
    {
        return $this->player_position->pass_yards / 25;
    }

    /**
     * Calculates total points for the amount of touchdowns thrown
     *
     * This currently uses the league rule of 6 points per touchdown
     *
     * @return integer
     */
    public function passTouchdownsWeight()
    {
        return $this->player_position->pass_touchdowns * 6;
    }

    /**
     * Calculates total negative points for the amount of interceptions thrown
     *
     * This currently uses the league rule of -2 points per interception
     *
     * @return integer
     */
    public function interceptionsWeight()
    {
        return $this->player_position->interceptions * -2;
    }

    /**
     * Calculates extra bonus for how many completions a player throws
     *
     *This is to add weight for players who complete a lot of passes
     *
     * @return float
     */
    protected function completionsWeight()
    {
        return $this->player_position->completions / 5;
    }

    /**
     * Calculate extra bonus for how many passes are attempted
     *
     * This is to add weight for players who get more opportunities
     *
     * @return float
     */
    protected function passAttemptsWeight()
    {
        return $this->player_position->pass_attempts / 10;
    }
}
