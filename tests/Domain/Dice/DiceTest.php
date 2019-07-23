<?php

namespace App\Tests\Domain\Dice;

use App\Domain\Dice\Factory\DiceFactory;
use App\Domain\Generator\Int\IntGenerator;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase
{
    /**
     * @var DiceFactory
     */
    private $diceFactory;

    protected function setUp()
    {
        srand(1000);
        $this->diceFactory = new DiceFactory(new IntGenerator());
    }

    public function testRollADiceGiveAnInt(): void
    {
        $dice = $this->diceFactory->create(4);

        $this->assertInternalType(IsType::TYPE_INT, $dice->roll());
    }

    public function testRollWith6Faces(): void
    {
        $dice = $this->diceFactory->create(6);

        $this->assertEquals(2, $dice->roll());
        $this->assertEquals(6, $dice->roll());
        $this->assertEquals(4, $dice->roll());
        $this->assertEquals(3, $dice->roll());
        $this->assertEquals(2, $dice->roll());
    }
}
