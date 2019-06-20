<?php

namespace App\Domain\MagicSchool\Date;

use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;

class DateRuleResolver
{
    public function greatestBirthYearForStudent(MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState): int
    {
        return ($schoolConfiguration->getCalendarYearStart() + $schoolState->getCurrentYear() - 1) - $schoolConfiguration->getFirstYearAge();
    }

    public function lowestYearBirthForStudent(MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState): int
    {
        return $this->greatestBirthYearForStudent($schoolConfiguration, $schoolState) - $schoolConfiguration->getNbStudyingYear();
    }

    public function age(\DateTime $birthdayDate, MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState): int
    {
        $currentYear = ($schoolConfiguration->getCalendarYearStart() + $schoolState->getCurrentYear() - 1);
        $age = $currentYear - (int) $birthdayDate->format('Y');

        if ($schoolState->getCurrentCalendarMonth() <= (int) $birthdayDate->format('m') && $schoolState->getCurrentCalendarDay() <= (int) $birthdayDate->format('d')) {
            --$age;
        }

        return $age;
    }
}
