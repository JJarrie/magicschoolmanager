<?php

namespace App\Domain\MagicSchool\Identity\RaisingWorld\Provider;

use App\Domain\MagicSchool\RaisingWorldConstant;

class DefaultRaisingWorldProvider implements RaisingWorldProviderInterface
{
    public function all(): array
    {
        return [RaisingWorldConstant::MUGGLES_WORLD, RaisingWorldConstant::WIZARDS_WORLD];
    }
}
