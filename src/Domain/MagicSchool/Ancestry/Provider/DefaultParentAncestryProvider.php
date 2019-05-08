<?php

namespace App\Domain\MagicSchool\Ancestry\Provider;

use App\Domain\MagicSchool\BloodStatusConstant;

class DefaultParentAncestryProvider implements ParentAncestryProviderInterface
{
    public function all(): \Traversable
    {
        return new \ArrayIterator([
            BloodStatusConstant::WIZARD,
            BloodStatusConstant::MUGGLE,
            BloodStatusConstant::MUGGLE_BORN,
            BloodStatusConstant::PURE_BLOOD,
            BloodStatusConstant::HALF_BLOOD,
        ]);
    }
}
