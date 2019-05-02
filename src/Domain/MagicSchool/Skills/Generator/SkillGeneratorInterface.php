<?php

namespace App\Domain\MagicSchool\Skills\Generator;

use App\Domain\MagicSchool\Characteristics\Characteristics;
use App\Domain\MagicSchool\Skills\Skills;

interface SkillGeneratorInterface
{
    public function generate(Characteristics $characteristics): Skills;
}
