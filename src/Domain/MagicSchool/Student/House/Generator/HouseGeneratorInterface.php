<?php

namespace App\Domain\MagicSchool\Student\House\Generator;

use App\Domain\Generator\GeneratorInterface;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;

interface HouseGeneratorInterface extends GeneratorInterface
{
    public function generate(Ancestry $ancestry): string;
}
