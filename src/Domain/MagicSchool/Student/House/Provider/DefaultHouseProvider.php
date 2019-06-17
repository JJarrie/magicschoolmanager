<?php

namespace App\Domain\MagicSchool\Student\House\Provider;

use App\Domain\MagicSchool\HouseConstant;

class DefaultHouseProvider implements HouseProviderInterface
{
    public function all(): array
    {
        return [HouseConstant::GRYFFINDOR, HouseConstant::HUFFLEPUFF, HouseConstant::RAVENCLAW, HouseConstant::SLYTHERIN];
    }

    public function muggleBloodPool(): array
    {
        return [HouseConstant::GRYFFINDOR, HouseConstant::HUFFLEPUFF, HouseConstant::RAVENCLAW];
    }
}
