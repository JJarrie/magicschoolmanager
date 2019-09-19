<?php

namespace App\Domain\MagicSchool;

class MagicSchoolConfiguration
{
    private int $calendarYearStart;
    private int $firstYearAge;
    private int $nbStudyingYear;
    private int $backToSchoolDay;
    private int $backToSchoolMonth;

    public function __construct(int $calendarYearStart, int $firstYearAge, int $nbStudyingYear, int $backToSchoolDay, int $backToSchoolMonth)
    {
        $this->calendarYearStart = $calendarYearStart;
        $this->firstYearAge = $firstYearAge;
        $this->nbStudyingYear = $nbStudyingYear;
        $this->backToSchoolDay = $backToSchoolDay;
        $this->backToSchoolMonth = $backToSchoolMonth;
    }

    public function getCalendarYearStart(): int
    {
        return $this->calendarYearStart;
    }

    public function getFirstYearAge(): int
    {
        return $this->firstYearAge;
    }

    public function getNbStudyingYear(): int
    {
        return $this->nbStudyingYear;
    }

    public function getBackToSchoolDay(): int
    {
        return $this->backToSchoolDay;
    }

    public function getBackToSchoolMonth(): int
    {
        return $this->backToSchoolMonth;
    }
}
