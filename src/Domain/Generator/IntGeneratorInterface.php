<?php

namespace App\Domain\Generator;

interface IntGeneratorInterface extends GeneratorInterface
{
    public function generate(): int;

    public function generateBetween(int $min, int $max): int;
}
