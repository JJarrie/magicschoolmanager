<?php

namespace App\Domain\Generator;

class DateGenerator implements DateGeneratorInterface
{
    private $intGenerator;

    public function __construct(IntGeneratorInterface $intGenerator)
    {
        $this->intGenerator = $intGenerator;
    }

    public function generate(): \DateTime
    {
        $timestamp = $this->intGenerator->generate();

        return $this->buildDateFromTimestamp($timestamp);
    }

    public function generateBetween(\DateTime $min, \DateTime $max): \DateTime
    {
        $timestamp = $this->intGenerator->generateBetween($min->getTimestamp(), $max->getTimestamp());

        return $this->buildDateFromTimestamp($timestamp);
    }

    private function buildDateFromTimestamp(int $timestamp): \DateTime
    {
        $date = new \DateTime();
        $date->setTimestamp($timestamp);

        return $date;
    }
}
