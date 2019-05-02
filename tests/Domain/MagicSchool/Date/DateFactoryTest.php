<?php

namespace App\Tests\Domain\MagicSchool\Date;

use App\Domain\Date\DateFactory;
use App\Domain\Date\Exceptions\DateTimeCreationException;
use PHPUnit\Framework\TestCase;

class DateFactoryTest extends TestCase
{
    /**
     * @var DateFactory
     */
    private DateFactory $dateFactory;

    protected function setUp(): void
    {
        $this->dateFactory = new DateFactory();
    }

    public function testCreationDateReturnCorrectDateTimeObject(): void
    {
        $date = $this->dateFactory->create(10, 6, 1900);

        $this->assertEquals('10', $date->format('d'));
        $this->assertEquals('06', $date->format('m'));
        $this->assertEquals('1900', $date->format('Y'));
        $this->assertEquals('00', $date->format('H'));
        $this->assertEquals('00', $date->format('i'));
        $this->assertEquals('00', $date->format('s'));
    }

    public function testCreationDateTimeReturnDateTimeObject(): void
    {
        $date = $this->dateFactory->create(10, 6, 1900, 16, 30, 30);

        $this->assertEquals('10', $date->format('d'));
        $this->assertEquals('06', $date->format('m'));
        $this->assertEquals('1900', $date->format('Y'));
        $this->assertEquals('16', $date->format('H'));
        $this->assertEquals('30', $date->format('i'));
        $this->assertEquals('30', $date->format('s'));
    }

    public function testCreationDateErronedThrowADateTimeCreationException(): void
    {
        $this->expectException(DateTimeCreationException::class);
        $this->expectExceptionMessage('Unable to create a date with the datas : 9.0E+22 89 89 1 00 00');

        $this->dateFactory->create(89999999999999999999999, 89, 89, 1);
    }
}
