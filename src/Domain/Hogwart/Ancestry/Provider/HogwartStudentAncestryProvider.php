<?php

namespace App\Domain\Hogwart\Ancestry\Provider;

use App\Domain\MagicSchool\Ancestry\Provider\StudentAncestryProviderInterface;
use App\Domain\MagicSchool\BloodStatus;

class HogwartStudentAncestryProvider implements StudentAncestryProviderInterface
{
    private const STATUS = [BloodStatus::WIZARD, BloodStatus::PURE_BLOOD, BloodStatus::MUGGLE_BORN, BloodStatus::HALF_BLOOD];

    public function all(): \Traversable
    {
        return new \ArrayIterator(self::STATUS);
    }

    public function random(): string
    {
        $key = array_rand(self::STATUS);

        return self::STATUS[$key];
    }
}
