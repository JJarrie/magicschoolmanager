<?php

namespace App\Context\Rules\Character;

use App\Domain\Character\Character;
use App\Domain\Character\Factory\CharacterFactory;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

class CharacterContext implements Context
{
    /**
     * @var string
     */
    private $characterName;

    /**
     * @var Character
     */
    private $character;

    /**
     * @Given /^a character's name "([^"]*)"$/
     */
    public function aCharacterSName(string $characterName)
    {
        $this->characterName = $characterName;
    }

    /**
     * @When /^I create a character$/
     */
    public function iCreateACharacter()
    {
        $this->character = (new CharacterFactory())->create($this->characterName);
    }

    /**
     * @Then /^I have a character$/
     */
    public function iHaveACharacter()
    {
        Assert::isInstanceOf($this->character, Character::class);
    }
}
