<?php

namespace App\Context\Rules\Character\Ancestry;

use App\Domain\Ancestry\Ancestry;
use App\Domain\Ancestry\Factory\AncestryFactory;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

class AncestryContext implements Context
{
    /**
     * @var string
     */
    private $breedingWorld;

    /**
     * @var string
     */
    private $ancestryName;

    /**
     * @var Ancestry
     */
    private $ancestry;

    /**
     * @Given /^a name (.*)$/
     */
    public function aName($ancestryName)
    {
        $this->ancestryName = $ancestryName;
    }

    /**
     * @Given /^a breeding world (.*)$/
     */
    public function aBreedingWorld($breedingWorld)
    {
        $this->breedingWorld = $breedingWorld;
    }

    /**
     * @When /^I create an ancestry$/
     */
    public function iCreateAnAncestry()
    {
        $this->ancestry = (new AncestryFactory())->create($this->ancestryName, $this->breedingWorld);
    }

    /**
     * @Then /^I have an ancestry$/
     */
    public function iHaveAnAncestry()
    {
        Assert::notNull($this->ancestry);
    }

    /**
     * @Given /^I have corrects informations into this$/
     */
    public function iHaveCorrectsInformationsIntoThis()
    {
        Assert::eq($this->ancestryName, $this->ancestry->getName());
        Assert::eq($this->breedingWorld, $this->ancestry->getBreedingWorld());
    }
}
