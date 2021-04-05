<?php

namespace App\Tests\Domain;

use App\Domain\Generator\Int\IntGenerator;
use App\Domain\Generator\Int\IntGeneratorInterface;
use PHPUnit\Framework\TestCase;

class IntGeneratorTest extends TestCase
{
    /**
     * @var IntGeneratorInterface
     */
    private $intGenerator;

    protected function setUp(): void
    {
        mt_srand(1000);
        $this->intGenerator = new IntGenerator();
    }

    public function testGenerate(): void
    {
        $this->assertEquals(1403572953, $this->intGenerator->generate());
        $this->assertEquals(441354539, $this->intGenerator->generate());
        $this->assertEquals(246975523, $this->intGenerator->generate());
        $this->assertEquals(1310787424, $this->intGenerator->generate());
    }

    public function testGenerateBetween1And100(): void
    {
        $this->assertEquals(8, $this->intGenerator->generateBetween(1, 100));
        $this->assertEquals(80, $this->intGenerator->generateBetween(1, 100));
        $this->assertEquals(48, $this->intGenerator->generateBetween(1, 100));
        $this->assertEquals(49, $this->intGenerator->generateBetween(1, 100));
    }
}
