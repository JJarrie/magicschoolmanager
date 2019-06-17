<?php

namespace App\Domain\MagicSchool\Student\House\Generator;

use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\BloodStatusConstant;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;
use App\Domain\MagicSchool\Student\House\Provider\HouseProviderInterface;

class DefaultHouseGenerator implements HouseGeneratorInterface
{
    private $arrayGenerator;
    private $houseProvider;

    public function __construct(ArrayGenerator $arrayGenerator, HouseProviderInterface $houseProvider)
    {
        $this->arrayGenerator = $arrayGenerator;
        $this->houseProvider = $houseProvider;
    }

    public function generate(Ancestry $ancestry): string
    {
        $pool = $this->houseProvider->all();

        if (!in_array($ancestry->getAncestry(), [BloodStatusConstant::PURE_BLOOD, BloodStatusConstant::WIZARD, BloodStatusConstant::HALF_BLOOD])) {
            $pool = $this->houseProvider->muggleBloodPool();
        }

        return $this->arrayGenerator->generate($pool);
    }
}
