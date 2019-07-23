<?php

namespace App\Domain\Generator;

use App\Domain\Generator\Int\IntGeneratorInterface;

class DateGenerator implements DateGeneratorInterface
{
    private $intGenerator;

    public function __construct(IntGeneratorInterface $intGenerator)
    {
        $this->intGenerator = $intGenerator;
    }

    public function generate(): \DateTimeImmutable
    {
        $timestamp = $this->intGenerator->generate();

        return $this->buildDateFromTimestamp($timestamp);
    }

    public function generateBetween(\DateTimeImmutable $min, \DateTimeImmutable $max): \DateTimeImmutable
    {
        $timestamp = $this->intGenerator->generateBetween($min->getTimestamp(), $max->getTimestamp());

        return $this->buildDateFromTimestamp($timestamp);
    }

    private function buildDateFromTimestamp(int $timestamp): \DateTimeImmutable
    {
        $date = new \DateTimeImmutable();
        $date->setTimestamp($timestamp);

        return $date;
    }
}
