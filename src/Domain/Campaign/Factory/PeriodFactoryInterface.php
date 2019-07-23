<?php

namespace App\Domain\Campaign\Factory;

use App\Domain\Campaign\Period;

interface PeriodFactoryInterface
{
    public function create(string $name): Period;
}
