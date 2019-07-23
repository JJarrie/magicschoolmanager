<?php

namespace App\Tests\Domain\Dice\Factory;

use App\Domain\Dice\Dice;
use App\Domain\Dice\Factory\DiceFactory;
use App\Domain\Generator\Int\IntGenerator;
use PHPUnit\Framework\TestCase;

class DiceFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $diceFactory = new DiceFactory(new IntGenerator());

        $this->assertInstanceOf(Dice::class, $diceFactory->create(4));
    }
}
