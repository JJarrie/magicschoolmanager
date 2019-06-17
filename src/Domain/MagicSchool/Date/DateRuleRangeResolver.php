<?php

namespace App\Domain\MagicSchool\Date;

use App\Domain\Date\DateFactory;
use App\Domain\Date\DateRange;
use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;

class DateRuleRangeResolver
{
    private $dateFactory;
    private $dateRuleResolver;

    public function __construct(DateFactory $dateFactory, DateRuleResolver $dateRuleResolver)
    {
        $this->dateFactory = $dateFactory;
        $this->dateRuleResolver = $dateRuleResolver;
    }

    public function birthdayRangeForStudents(MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState): DateRange
    {
        $day = $schoolConfiguration->getBackToSchoolDay();
        $month = $schoolConfiguration->getBackToSchoolMonth();

        return new DateRange(
            $this->dateFactory->create($day, $month, $this->dateRuleResolver->lowestYearBirthForStudent($schoolConfiguration, $schoolState)),
            $this->dateFactory->create($day, $month, $this->dateRuleResolver->greatestBirthYearForStudent($schoolConfiguration, $schoolState))
        );
    }

    public function birthdayRangeForStudent(int $studentYear, MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState): DateRange
    {
        $lowestYear = $this->dateRuleResolver->lowestYearBirthForStudent($schoolConfiguration, $schoolState);
        $day = $schoolConfiguration->getBackToSchoolDay();
        $month = $schoolConfiguration->getBackToSchoolMonth();

        return new DateRange(
            $this->dateFactory->create($day, $month, $lowestYear + $schoolConfiguration->getNbStudyingYear() - $studentYear - 1),
            $this->dateFactory->create($day, $month, $lowestYear + $schoolConfiguration->getNbStudyingYear() - $studentYear)
        );
    }
}
