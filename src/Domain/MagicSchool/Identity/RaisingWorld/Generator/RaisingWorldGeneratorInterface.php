<?php

namespace App\Domain\MagicSchool\Identity\RaisingWorld\Generator;

use App\Domain\Generator\GeneratorInterface;

interface RaisingWorldGeneratorInterface extends GeneratorInterface
{
    public function generate(): string;
}
