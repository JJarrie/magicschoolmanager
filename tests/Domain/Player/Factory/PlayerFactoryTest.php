<?php

namespace App\Tests\Domain\Player\Factory;

use App\Domain\Player\Factory\PlayerFactory;
use App\Domain\Player\Player;
use PHPUnit\Framework\TestCase;

class PlayerFactoryTest extends TestCase
{
    public function testCreateGivePlayer(): void
    {
        $player = (new PlayerFactory())->create('');

        $this->assertInstanceOf(Player::class, $player);
    }

    public function testCreateGivePlayerWithCorrectName(): void
    {
        $player = (new PlayerFactory())->create('Henry');

        $this->assertEquals('Henry', $player->getName());
    }
}
