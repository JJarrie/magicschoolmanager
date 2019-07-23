<?php

namespace App\Domain\Campaign\Factory;

use App\Domain\Campaign\Campaign;
use App\Domain\Campaign\Period;

interface CampaignFactoryInterface
{
    public function create(Period $period): Campaign;
}
