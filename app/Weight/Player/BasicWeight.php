<?php

namespace App\Weight\Player;

use App\Models\Player;
use App\Weight\WeightInterface;

/**
 * Generate a starting weight based on some general information about any given player.
 *
 * This is the starting point for player's total points
 */
class BasicWeight implements WeightInterface
{
    /**
     * How many games are in an NFL season
     */
    const GAMES_IN_SEASON = 16;

    public function __construct(Player $player)
    {
        return $this->player = $player;
    }

    /**
     * Total points calculated off generic player information
     *
     * @return float
     */
    public function weight()
    {
        return array_sum([
            $this->getAttendanceWeight(),
            $this->getTotalFantasyWeight(),
        ]);
    }

    /**
     * Calculate points for game attendance
     *
     * @return float
     */
    protected function getAttendanceWeight()
    {
        return self::GAMES_IN_SEASON / 100 * $this->player->games_played;
    }

    /**
     * Calculate points for total season fantasy
     *
     * @return float
     */
    protected function getTotalFantasyWeight()
    {
        return $this->player->total_fantasy;
    }
}
