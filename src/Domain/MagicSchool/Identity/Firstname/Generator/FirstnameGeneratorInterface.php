<?php

namespace App\Domain\MagicSchool\Identity\Firstname\Generator;

use App\Domain\Generator\GeneratorInterface;

interface FirstnameGeneratorInterface extends GeneratorInterface
{
    public function generate(string $gender): string;
}
