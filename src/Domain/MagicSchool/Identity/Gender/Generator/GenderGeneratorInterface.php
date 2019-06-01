<?php

namespace App\Domain\MagicSchool\Identity\Gender\Generator;

use App\Domain\Generator\GeneratorInterface;

interface GenderGeneratorInterface extends GeneratorInterface
{
    public function generate(): string;
}
