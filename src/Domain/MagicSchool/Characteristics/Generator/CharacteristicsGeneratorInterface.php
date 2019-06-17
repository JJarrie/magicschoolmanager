<?php

namespace App\Domain\MagicSchool\Characteristics\Generator;

use App\Domain\MagicSchool\Characteristics\Characteristics;

interface CharacteristicsGeneratorInterface
{
    public function generate(int $currentYear): Characteristics;
}
