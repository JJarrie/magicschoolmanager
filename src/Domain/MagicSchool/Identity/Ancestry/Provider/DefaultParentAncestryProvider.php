<?php

namespace App\Domain\MagicSchool\Identity\Ancestry\Provider;

use App\Domain\MagicSchool\BloodStatusConstant;

class DefaultParentAncestryProvider implements ParentAncestryProviderInterface
{
    public function all(): array
    {
        return [
            BloodStatusConstant::WIZARD,
            BloodStatusConstant::MUGGLE,
            BloodStatusConstant::MUGGLE_BORN,
            BloodStatusConstant::PURE_BLOOD,
            BloodStatusConstant::HALF_BLOOD,
        ];
    }
}
