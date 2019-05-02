<?php

namespace App\Domain\MagicSchool\Identity\Ancestry\Generator;

use App\Domain\Generator\GeneratorInterface;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;

interface AncestryGeneratorInterface extends GeneratorInterface
{
    public function generate(): Ancestry;
}
