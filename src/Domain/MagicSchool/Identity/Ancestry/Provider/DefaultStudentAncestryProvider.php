<?php

namespace App\Domain\MagicSchool\Identity\Ancestry\Provider;

use App\Domain\MagicSchool\BloodStatusConstant;

class DefaultStudentAncestryProvider implements StudentAncestryProviderInterface
{
    public function all(): array
    {
        return [BloodStatusConstant::WIZARD, BloodStatusConstant::PURE_BLOOD, BloodStatusConstant::MUGGLE_BORN, BloodStatusConstant::HALF_BLOOD];
    }
}
