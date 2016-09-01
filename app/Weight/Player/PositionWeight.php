<?php

namespace App\Weight\Player;

use App\Models\PlayerPosition;
use App\Weight\WeightInterface;

/**
 * Generate the weight of a player based on basic information and position specific information
 *
 * This will generate the total points calculated for a player
 */
class PositionWeight implements WeightInterface
{
    public function __construct(PlayerPosition $player_position)
    {
        $this->player_position = $player_position;
    }

    /**
     * Adds the basic points along with the position specific points to get a final weight
     *
     * @return float
     */
    public function weight()
    {
        $basic_weight = app('App\Weight\Player\BasicWeight', [$this->player_position->player])->weight();

        return $basic_weight + $this->positionSpecificWeight();
    }

    /**
     * Finds all the position specific weight classes to add together
     *
     * @param  string $position K|QB|RB|TE|WR
     *
     * @return array
     */
    public function getWeightClasses()
    {
        return get_classes(app_path("Weight/Player/{$this->player_position->position}"), function ($file) {
            return !starts_with($file, 'Weight');
        });
    }

    /**
     * Calculates the total points related to players specific position
     *
     * Goes through each weight class and adds up all the points
     *
     * @return float
     */
    public function positionSpecificWeight()
    {
        return array_reduce($this->getWeightClasses(), function ($carry, $class) {
            $carry += app("App\Weight\Player\\{$this->player_position->position}\\$class", [$this->player_position])->weight();

            return $carry;
        });
    }
}
