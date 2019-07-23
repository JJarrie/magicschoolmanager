<?php

namespace App\Domain\Date;

use App\Domain\Date\Exceptions\DateTimeCreationException;

class DateFactory
{
    private const CREATE_FORMAT = 'd m Y H i s';

    public function create(string $day, string $month, string $year, string $hours = '00', string $minutes = '00', string $seconds = '00'): \DateTimeImmutable
    {
        $creationString = sprintf('%s %s %s %s %s %s', $day, $month, $year, $hours, $minutes, $seconds);
        $datetime = \DateTimeImmutable::createFromFormat(self::CREATE_FORMAT, $creationString);

        if (false === $datetime) {
            throw new DateTimeCreationException(sprintf('Unable to create a date with the datas : %s', $creationString));
        }

        return $datetime;
    }
}
