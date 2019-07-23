<?php

namespace App\Domain\Campaign\Factory;

use App\Domain\Campaign\Campaign;
use App\Domain\Campaign\Period;

class CampaignFactory implements CampaignFactoryInterface
{
    public function create(Period $period): Campaign
    {
        return new Campaign($period);
    }
}
