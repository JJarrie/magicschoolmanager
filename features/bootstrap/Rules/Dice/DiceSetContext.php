<?php

namespace App\Context\Rules\Dice;

use App\Domain\Dice\Dice;

use App\Domain\Dice\Factory\DiceFactory;
use App\Domain\Generator\Int\IntGenerator;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

class DiceSetContext implements Context
{
    /**
     * @var Dice
     */
    private $dice;

    /**
     * @var int|null
     */
    private $diceResult;

    /**
     * @Given /^a dice with (?<faces>\d+) faces$/
     */
    public function aDiceWithFaces(int $faces): void
    {
        $this->dice = (new DiceFactory(new IntGenerator()))->create($faces);
    }

    /**
     * @When /^I roll it$/
     */
    public function iRollIt()
    {
        $this->diceResult = $this->dice->roll();
    }

    /**
     * @Then /^I have a result$/
     */
    public function iHaveAResult()
    {
        Assert::notNull($this->diceResult);
    }

    /**
     * @Given /^it's greather or equals to (?<lowerValue>\d+)$/
     */
    public function itSGreatherOrEqualsTo(int $lowerValue)
    {
        Assert::greaterThanEq($this->diceResult, $lowerValue);
    }

    /**
     * @Given /^it's lower or equals to (?<greaterValue>\d+)$/
     */
    public function itSLowerOrEqualsTo(int $greaterValue)
    {
        Assert::lessThanEq($this->diceResult, $greaterValue);
    }
}
