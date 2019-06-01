<?php

namespace App\Domain\MagicSchool\Student\House\Provider;

use App\Domain\Provider\ProviderInterface;

interface HouseProviderInterface extends ProviderInterface
{
    public function muggleBloodPool(): array;
}
