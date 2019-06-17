<?php

namespace App\Domain\MagicSchool\Wand\EssenceWood\Generator;

use App\Domain\Generator\GeneratorInterface;

interface EssenceWoodGeneratorInterface extends GeneratorInterface
{
    public function generate(): string;
}
