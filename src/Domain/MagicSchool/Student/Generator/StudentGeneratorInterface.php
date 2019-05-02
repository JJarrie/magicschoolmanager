<?php

namespace App\Domain\MagicSchool\Student\Generator;

use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;
use App\Domain\MagicSchool\Student\Student;

interface StudentGeneratorInterface
{
    public function generate(MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState): Student;
}
