<?php

namespace App\Domain\Generator;

class ArrayGenerator implements GeneratorInterface
{
    public function generate(array $pool)
    {
        $key = array_rand($pool);

        return $pool[$key];
    }
}
