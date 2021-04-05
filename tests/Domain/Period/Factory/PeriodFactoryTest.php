<?php

namespace App\Tests\Domain\Period\Factory;

use App\Domain\Campaign\Factory\PeriodFactory;
use App\Domain\Campaign\Period;
use PHPUnit\Framework\TestCase;

class PeriodFactoryTest extends TestCase
{
    /**
     * @var PeriodFactory
     */
    private $periodFactory;

    protected function setUp(): void
    {
        $this->periodFactory = new PeriodFactory();
    }

    public function testCreateGivePeriod(): void
    {
        $period = $this->periodFactory->create('Far past');
        $this->assertInstanceOf(Period::class, $period);
    }

    public function testCreateGiveCorrectName(): void
    {
        $period = $this->periodFactory->create('Far past');
        $this->assertEquals('Far past', $period->getName());
    }
}
