<?php

namespace App\Domain\MagicSchool\Wand\Generator;

use App\Domain\Generator\GeneratorInterface;
use App\Domain\MagicSchool\Wand\Wand;

interface WandGeneratorInterface extends GeneratorInterface
{
    public function generate(): Wand;
}
