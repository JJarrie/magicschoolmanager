<?php

namespace App\Domain\MagicSchool\Identity\Lastname\Generator;

use App\Domain\Generator\GeneratorInterface;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;

interface LastnameGeneratorInterface extends GeneratorInterface
{
    public function generate(Ancestry $ancestry): string;
}
