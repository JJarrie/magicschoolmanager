<?php

namespace App\Tests\Domain\Ancestry\Factory;

use App\Domain\Ancestry\Ancestry;
use App\Domain\Ancestry\Factory\AncestryFactory;
use PHPUnit\Framework\TestCase;

class AncestryFactoryTest extends TestCase
{
    /**
     * @var AncestryFactory
     */
    private $ancestryFactory;

    protected function setUp()
    {
        $this->ancestryFactory = new AncestryFactory();
    }

    public function testCreateGiveAncestry(): void
    {
        $ancestry = $this->ancestryFactory->create('ancestry_name', 'breeding_world');

        $this->assertInstanceOf(Ancestry::class, $ancestry);
    }

    public function testCreateGivePeriodWithCorrectName(): void
    {
        $ancestry = $this->ancestryFactory->create('MuggleBorn', 'MuggleWorld');

        $this->assertEquals('MuggleBorn', $ancestry->getName());
    }

    public function testCreateGivePeriodWithCorrectBreedingWorld(): void
    {
        $ancestry = $this->ancestryFactory->create('MuggleBorn', 'MuggleWorld');

        $this->assertEquals('MuggleWorld', $ancestry->getBreedingWorld());
    }
}
