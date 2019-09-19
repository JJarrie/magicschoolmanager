<?php

namespace App\Domain\MagicSchool;

class MagicSchoolState
{
    private int $currentYear;
    private int $currentCalendarDay;
    private int $currentCalendarMonth;

    public function __construct(int $currentYear, int $currentCalendarDay, int $currentCalendarMonth)
    {
        $this->currentYear = $currentYear;
        $this->currentCalendarDay = $currentCalendarDay;
        $this->currentCalendarMonth = $currentCalendarMonth;
    }

    public function getCurrentYear(): int
    {
        return $this->currentYear;
    }

    public function getCurrentCalendarDay(): int
    {
        return $this->currentCalendarDay;
    }

    public function getCurrentCalendarMonth(): int
    {
        return $this->currentCalendarMonth;
    }
}
