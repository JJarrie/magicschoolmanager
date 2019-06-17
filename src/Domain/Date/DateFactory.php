<?php

namespace App\Domain\Date;

class DateFactory
{
    private const CREATE_FORMAT = 'd m Y H i s';

    public function create(int $day, int $month, int $year, int $hours = 0, int $minutes = 0, int $seconds = 0): \DateTime
    {
        return \DateTime::createFromFormat(self::CREATE_FORMAT, sprintf('%02d %02d %04d %02d %02d %02d', $day, $month, $year, $hours, $minutes, $seconds));
    }
}
