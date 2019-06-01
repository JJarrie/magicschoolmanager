<?php

namespace App\Domain\MagicSchool\Student\Generator;

use App\Domain\Generator\IntGenerator;
use App\Domain\MagicSchool\Characteristics\Generator\CharacteristicsGeneratorInterface;
use App\Domain\MagicSchool\Identity\Generator\IdentityGeneratorInterface;
use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;
use App\Domain\MagicSchool\Student\House\Generator\HouseGeneratorInterface;
use App\Domain\MagicSchool\Student\Student;

class DefaultStudentGenerator implements StudentGeneratorInterface
{
    private $identityGenerator;
    private $intGenerator;
    private $houseGenerator;
    private $characteristicsGenerator;

    public function __construct(IdentityGeneratorInterface $identityGenerator, IntGenerator $intGenerator, HouseGeneratorInterface $houseGenerator, CharacteristicsGeneratorInterface $characteristicsGenerator)
    {
        $this->identityGenerator = $identityGenerator;
        $this->intGenerator = $intGenerator;
        $this->houseGenerator = $houseGenerator;
        $this->characteristicsGenerator = $characteristicsGenerator;
    }

    public function generate(MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState): Student
    {
        $currentYear = $this->intGenerator->generateBetween(1, $schoolConfiguration->getNbStudyingYear());
        $identity = $this->identityGenerator->generate($schoolConfiguration, $schoolState, $currentYear);

        return new Student(
            $identity,
            $currentYear,
            $this->houseGenerator->generate($identity->getAncestry()),
            $this->characteristicsGenerator->generate($currentYear)
        );
    }
}
