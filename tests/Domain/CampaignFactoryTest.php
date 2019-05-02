<?php

namespace App\Tests\Domain;

use App\Domain\Campaign\Campaign;
use App\Domain\Campaign\Factory\CampaignFactory;
use App\Domain\Campaign\Factory\PeriodFactory;
use PHPUnit\Framework\TestCase;

class CampaignFactoryTest extends TestCase
{
    public function testCreateGiveCampaign(): void
    {
        $period = (new PeriodFactory())->create('Far past');
        $this->assertInstanceOf(Campaign::class, (new CampaignFactory())->create($period));
    }
}
