<?php

namespace App\Domain\Ancestry\Factory;

use App\Domain\Ancestry\Ancestry;

class AncestryFactory implements AncestryFactoryInterface
{
    public function create(string $name, string $breedingWorld): Ancestry
    {
        return new Ancestry($name, $breedingWorld);
    }
}
