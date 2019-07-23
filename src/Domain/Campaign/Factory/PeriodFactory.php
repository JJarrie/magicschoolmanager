<?php

namespace App\Domain\Campaign\Factory;

use App\Domain\Campaign\Period;

class PeriodFactory implements PeriodFactoryInterface
{
    public function create(string $name): Period
    {
        return new Period($name);
    }
}
