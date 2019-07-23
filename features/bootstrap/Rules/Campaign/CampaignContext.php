<?php

namespace App\Context\Rules\Campaign;

use App\Domain\Campaign\Campaign;
use App\Domain\Campaign\Factory\CampaignFactory;
use App\Domain\Campaign\Factory\PeriodFactory;
use App\Domain\Campaign\Period;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

class CampaignContext implements Context
{
    /**
     * @var Campaign
     */
    private $campaign;

    /**
     * @var Period
     */
    private $period;

    /**
     * @When /^I create a campaign$/
     */
    public function iCreateACampaign()
    {
        $this->campaign = (new CampaignFactory())->create($this->period);
    }

    /**
     * @Then /^I have a campaign$/
     */
    public function iHaveACampaign()
    {
        Assert::isInstanceOf($this->campaign, Campaign::class);
    }

    /**
     * @Given /^a period "([^"]*)"$/
     */
    public function aPeriod($periodName)
    {
        $this->period = (new PeriodFactory())->create($periodName);
    }
}
