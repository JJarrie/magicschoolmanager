<?php

namespace App\Domain\MagicSchool\Identity\Gender\Provider;

use App\Domain\MagicSchool\GenderConstant;

class DefaultGenderProvider implements GenderProviderInterface
{
    public function all(): array
    {
        return [GenderConstant::FEMALE, GenderConstant::MALE];
    }
}
