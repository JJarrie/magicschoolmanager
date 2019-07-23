<?php

namespace App\Tests\Domain\Character\Factory;

use App\Domain\Character\Character;
use App\Domain\Character\Factory\CharacterFactory;
use PHPUnit\Framework\TestCase;

class CharacterFactoryTest extends TestCase
{
    public function testCreateGiveCharacter(): void
    {
        $characterFactory = new CharacterFactory();

        $this->assertInstanceOf(Character::class, $characterFactory->create(''));
    }

    public function testCreateGiveCharacterWithCorrectName(): void
    {
        $characterFactory = new CharacterFactory();
        $character = $characterFactory->create('Ramsey');

        $this->assertEquals('Ramsey', $character->getName());
    }
}
