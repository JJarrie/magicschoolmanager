<?php

namespace App\Domain\MagicSchool\Wand\WandSize\Generator;

use App\Domain\Generator\GeneratorInterface;

interface WandSizeGeneratorInterface extends GeneratorInterface
{
    public function generate(): int;
}
