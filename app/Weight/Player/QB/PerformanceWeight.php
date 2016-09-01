<?php

namespace App\Weight\Player\QB;

use App\Models\QuarterBack;
use App\Weight\WeightInterface;

class PerformanceWeight implements WeightInterface
{
    protected $quarter_back;

    public function __construct(QuarterBack $quarter_back)
    {
        $this->quarter_back = $quarter_back;
    }

    public function weight()
    {
        return array_sum([
            $this->passingWeight(),
            $this->rushingWeight(),
        ]);
    }

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

    public function rushingWeight()
    {
        return array_sum([
            $this->rushYardsWeight(),
            $this->rushTouchdownsWeight(),
            $this->carriesWeight(),
        ]);
    }

    protected function passYardsWeight()
    {
        return $this->quarter_back->pass_yards / 25;
    }

    protected function passTouchdownsWeight()
    {
        return $this->quarter_back->pass_touchdowns * 6;
    }

    protected function interceptionsWeight()
    {
        return $this->quarter_back->interceptions * -2;
    }

    protected function rushYardsWeight()
    {
        return $this->quarter_back->rush_yards / 10;
    }

    protected function rushTouchdownsWeight()
    {
        return $this->quarter_back->rush_touchdowns * 6;
    }

    protected function carriesWeight()
    {
        return $this->quarter_back->carries / 5;
    }

    protected function completionsWeight()
    {
        return $this->quarter_back->completions / 5;
    }

    protected function passAttemptsWeight()
    {
        return $this->quarter_back->pass_attempts / 10;
    }
}
