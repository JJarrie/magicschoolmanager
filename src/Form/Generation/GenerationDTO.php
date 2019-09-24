<?php

namespace App\Form\Generation;

use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;

class GenerationDTO
{
    private int $studentsCount = 1;
    private MagicSchoolConfiguration $schoolConfiguration;
    private MagicSchoolState $schoolState;

    public function getSchoolConfiguration(): MagicSchoolConfiguration
    {
        return $this->schoolConfiguration;
    }

    public function getSchoolState(): MagicSchoolState
    {
        return $this->schoolState;
    }

    public function setSchoolConfiguration(MagicSchoolConfiguration $schoolConfiguration): void
    {
        $this->schoolConfiguration = $schoolConfiguration;
    }

    public function setSchoolState(MagicSchoolState $schoolState): void
    {
        $this->schoolState = $schoolState;
    }

    public function getStudentsCount(): int
    {
        return $this->studentsCount;
    }

    public function setStudentsCount(int $studentsCount): void
    {
        $this->studentsCount = $studentsCount;
    }
}
