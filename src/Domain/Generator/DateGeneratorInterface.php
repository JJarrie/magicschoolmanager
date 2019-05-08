<?php

namespace App\Domain\Generator;

interface DateGeneratorInterface extends GeneratorInterface
{
    public function generate(): \DateTime;

    public function generateBetween(\DateTime $min, \DateTime $max): \DateTime;
}
