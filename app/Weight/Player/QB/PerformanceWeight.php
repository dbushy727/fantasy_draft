<?php

namespace App\Weight\Player\QB;

use App\Models\QuarterBack;
use App\Weight\Player\Traits\Passing;
use App\Weight\Player\Traits\Rushing;
use App\Weight\WeightInterface;

class PerformanceWeight implements WeightInterface
{
    use Passing, Rushing;

    protected $quarter_back;

    public function __construct(QuarterBack $quarter_back)
    {
        $this->player_position = $quarter_back;
    }

    /**
     * Calculates the total of all the point categories
     *
     * @return float
     */
    public function weight()
    {
        return array_sum([
            $this->passingWeight(),
            $this->rushingWeight(),
        ]);
    }

    /**
     * Calculates the total points for passing related attributes
     *
     * @return float
     */
    public function passingWeight()
    {
        return array_sum([
            $this->passYardsWeight(),
            $this->passTouchdownsWeight(),
            $this->interceptionsWeight(),
            $this->passAttemptsWeight(),
            $this->completionsWeight(),
        ]);
    }

    /**
     * Calculates the total points for rushing related attributes
     *
     * @return float
     */
    public function rushingWeight()
    {
        return array_sum([
            $this->rushYardsWeight(),
            $this->rushTouchdownsWeight(),
            $this->carriesWeight(),
        ]);
    }
}
