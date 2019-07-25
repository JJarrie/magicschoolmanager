<?php

namespace App\Tests\Domain\Player\Factory;

use App\Domain\User\Factory\UserFactory;
use App\Domain\User\UserInterface;
use PHPUnit\Framework\TestCase;

class PlayerFactoryTest extends TestCase
{
    public function testCreateGivePlayer(): void
    {
        $player = (new UserFactory())->create('');

        $this->assertInstanceOf(UserInterface::class, $player);
    }

    public function testCreateGivePlayerWithCorrectName(): void
    {
        $player = (new UserFactory())->create('Henry');

        $this->assertEquals('Henry', $player->getName());
    }
}
