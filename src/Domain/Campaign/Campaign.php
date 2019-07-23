<?php

namespace App\Domain\Campaign;

class Campaign
{
    private $period;

    public function __construct(Period $period)
    {
        $this->period = $period;
    }
}
