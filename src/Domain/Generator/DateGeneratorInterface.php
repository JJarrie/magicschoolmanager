<?php

namespace App\Domain\Generator;

interface DateGeneratorInterface extends GeneratorInterface
{
    public function generate(): \DateTimeImmutable;

    public function generateBetween(\DateTimeImmutable $min, \DateTimeImmutable $max): \DateTimeImmutable;
}
