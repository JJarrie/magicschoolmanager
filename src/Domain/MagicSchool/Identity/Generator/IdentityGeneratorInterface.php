<?php

namespace App\Domain\MagicSchool\Identity\Generator;

use App\Domain\Generator\GeneratorInterface;
use App\Domain\MagicSchool\Identity\Identity;
use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;

interface IdentityGeneratorInterface extends GeneratorInterface
{
    public const UNDEFINED_YEAR = -1;

    public function generate(MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState, int $year = self::UNDEFINED_YEAR): Identity;
}
