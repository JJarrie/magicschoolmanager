<?php

namespace App\Domain\MagicSchool\Ancestry\Generator;

use App\Domain\Generator\GeneratorInterface;
use App\Domain\MagicSchool\Ancestry\AncestryInterface;

interface AncestryGeneratorInterface extends GeneratorInterface
{
    public function generate(): AncestryInterface;
}
