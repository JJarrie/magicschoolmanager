<?php

namespace App\Domain\Date;

class DateRange
{
    private $from;
    private $to;

    public function __construct(\DateTimeImmutable $from, \DateTimeImmutable $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function getFrom(): \DateTimeImmutable
    {
        return $this->from;
    }

    public function getTo(): \DateTimeImmutable
    {
        return $this->to;
    }
}
