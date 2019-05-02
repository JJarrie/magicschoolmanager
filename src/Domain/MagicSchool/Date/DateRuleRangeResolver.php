<?php

namespace App\Domain\MagicSchool\Date;

use App\Domain\Date\DateFactory;
use App\Domain\Date\DateRange;
use App\Domain\MagicSchool\MagicSchoolConfiguration;
use App\Domain\MagicSchool\MagicSchoolState;

class DateRuleRangeResolver
{
    private DateFactory $dateFactory;
    private DateRuleResolver $dateRuleResolver;

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
            $this->dateFactory->create(
                sprintf('%02d', $day),
                sprintf('%02d', $month),
                sprintf('%4d', $this->dateRuleResolver->lowestYearBirthForStudent($schoolConfiguration, $schoolState))
            ),
            $this->dateFactory->create(
                sprintf('%02d', $day),
                sprintf('%02d', $month),
                sprintf('%4d', $this->dateRuleResolver->greatestBirthYearForStudent($schoolConfiguration, $schoolState))
            )
        );
    }

    public function birthdayRangeForStudent(int $studentYear, MagicSchoolConfiguration $schoolConfiguration, MagicSchoolState $schoolState): DateRange
    {
        $lowestYear = $this->dateRuleResolver->lowestYearBirthForStudent($schoolConfiguration, $schoolState);
        $day = $schoolConfiguration->getBackToSchoolDay();
        $month = $schoolConfiguration->getBackToSchoolMonth();

        return new DateRange(
            $this->dateFactory->create(
                sprintf('%02d', $day),
                sprintf('%02d', $month),
                sprintf('%4d', $lowestYear + $schoolConfiguration->getNbStudyingYear() - $studentYear - 1)
            ),
            $this->dateFactory->create(
                sprintf('%02d', $day),
                sprintf('%02d', $month),
                sprintf('%4d', $lowestYear + $schoolConfiguration->getNbStudyingYear() - $studentYear)
            )
        );
    }
}
