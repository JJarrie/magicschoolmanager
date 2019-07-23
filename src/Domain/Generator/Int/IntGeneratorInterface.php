<?php

namespace App\Domain\Generator\Int;

use App\Domain\Generator\GeneratorInterface;

interface IntGeneratorInterface extends GeneratorInterface
{
    public function generate(): int;

    public function generateBetween(int $min, int $max): int;
}
