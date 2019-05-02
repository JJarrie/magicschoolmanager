<?php

namespace App\Domain\Ancestry\Factory;

use App\Domain\Ancestry\Ancestry;

interface AncestryFactoryInterface
{
    public function create(string $ancestryName, string $breedingWorld): Ancestry;
}
