<?php

namespace App\Domain\MagicSchool;

class MagicSchoolConfiguration
{
    private $calendarYearStart;
    private $firstYearOld;
    private $nbStudyingYear;
    private $backToSchoolDay;
    private $backToSchoolMonth;

    public function __construct(int $calendarYearStart, int $firstYearOld, int $nbStudyingYear, int $backToSchoolDay, int $backToSchoolMonth)
    {
        $this->calendarYearStart = $calendarYearStart;
        $this->firstYearOld = $firstYearOld;
        $this->nbStudyingYear = $nbStudyingYear;
        $this->backToSchoolDay = $backToSchoolDay;
        $this->backToSchoolMonth = $backToSchoolMonth;
    }

    public function getCalendarYearStart(): int
    {
        return $this->calendarYearStart;
    }

    public function getFirstYearOld(): int
    {
        return $this->firstYearOld;
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
