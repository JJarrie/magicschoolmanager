<?php

namespace App\Domain\MagicSchool\Student\Generator;

use App\Domain\Generator\IntGenerator;
use App\Domain\MagicSchool\Characteristics\Generator\CharacteristicsGeneratorInterface;
use App\Domain\MagicSchool\Identity\Generator\IdentityGeneratorInterface;
use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;
use App\Domain\MagicSchool\Skills\Generator\SkillGeneratorInterface;
use App\Domain\MagicSchool\Student\House\Generator\HouseGeneratorInterface;
use App\Domain\MagicSchool\Student\Student;
use App\Domain\MagicSchool\Wand\Generator\WandGeneratorInterface;

class DefaultStudentGenerator implements StudentGeneratorInterface
{
    private $identityGenerator;
    private $intGenerator;
    private $houseGenerator;
    private $characteristicsGenerator;
    private $skillsGenerator;
    private $wandGenerator;

    public function __construct(IdentityGeneratorInterface $identityGenerator, IntGenerator $intGenerator, HouseGeneratorInterface $houseGenerator, CharacteristicsGeneratorInterface $characteristicsGenerator, SkillGeneratorInterface $skillGenerator, WandGeneratorInterface $wandGenerator)
    {
        $this->identityGenerator = $identityGenerator;
        $this->intGenerator = $intGenerator;
        $this->houseGenerator = $houseGenerator;
        $this->characteristicsGenerator = $characteristicsGenerator;
        $this->skillsGenerator = $skillGenerator;
        $this->wandGenerator = $wandGenerator;
    }

    public function generate(MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState): Student
    {
        $currentYear = $this->intGenerator->generateBetween(1, $schoolConfiguration->getNbStudyingYear());
        $identity = $this->identityGenerator->generate($schoolConfiguration, $schoolState, $currentYear);
        $characteristics = $this->characteristicsGenerator->generate($currentYear);

        return new Student(
            $identity,
            $currentYear,
            $this->houseGenerator->generate($identity->getAncestry()),
            $characteristics,
            $this->skillsGenerator->generate($characteristics),
            $this->wandGenerator->generate()
        );
    }
}
