<?php

namespace App\Context\Rules\Player;

use App\Domain\Player\Factory\PlayerFactory;
use App\Domain\Player\Player;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

class PlayerContext implements Context
{
    /**
     * @var string
     */
    private $playerName;

    /**
     * @var Player
     */
    private $player;

    /**
     * @Given /^a player's name "(?<playerName>.*)"$/
     */
    public function aPlayerSName($playerName)
    {
        $this->playerName = $playerName;
    }

    /**
     * @When /^I create a player$/
     */
    public function iCreateAPlayer()
    {
        $this->player = (new PlayerFactory())->create($this->playerName);
    }

    /**
     * @Then /^I have a player$/
     */
    public function iHaveAPlayer()
    {
        Assert::notNull($this->player);
    }

    /**
     * @Given /^the player has the correct name$/
     */
    public function thePlayerHasTheCorrectName()
    {
        Assert::eq($this->playerName, $this->player->getName());
    }
}
