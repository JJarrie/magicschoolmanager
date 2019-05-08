<?php

namespace App\Domain\Generator;

class IntGenerator implements GeneratorInterface
{
    public function generate(): int
    {
        return mt_rand();
    }

    public function generateBetween(int $min, int $max): int
    {
        return mt_rand($min, $max);
    }
}
