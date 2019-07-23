<?php

namespace App\Context\Rules\Campaign\Period;

use App\Domain\Campaign\Factory\PeriodFactory;
use App\Domain\Campaign\Period;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

class PeriodContext implements Context
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Period
     */
    private $period;

    /**
     * @Given /^a name "(?<name>[^"]*)"$/
     */
    public function aName($name)
    {
        $this->name = $name;
    }

    /**
     * @When /^I create a period with this name$/
     */
    public function iCreateAPeriodWithThisName()
    {
        $this->period = (new PeriodFactory())->create($this->name);
    }

    /**
     * @Then /^I have a period with this name$/
     */
    public function iHaveAPeriodWithThisName()
    {
        Assert::notNull($this->period);
        Assert::eq($this->period->getName(), $this->name);
    }
}
