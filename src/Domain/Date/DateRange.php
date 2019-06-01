<?php

namespace App\Domain\Date;

class DateRange
{
    private $from;
    private $to;

    public function __construct(\DateTime $from, \DateTime $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function getFrom(): \DateTime
    {
        return $this->from;
    }

    public function getTo(): \DateTime
    {
        return $this->to;
    }


}
