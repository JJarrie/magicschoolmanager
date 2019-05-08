<?php

namespace App\Domain\MagicSchool\Ancestry\Provider;

use App\Domain\MagicSchool\BloodStatusConstant;

class DefaultStudentAncestryProvider implements StudentAncestryProviderInterface
{
    public function all(): \Traversable
    {
        return new \ArrayIterator([BloodStatusConstant::WIZARD, BloodStatusConstant::PURE_BLOOD, BloodStatusConstant::MUGGLE_BORN, BloodStatusConstant::HALF_BLOOD]);
    }
}
