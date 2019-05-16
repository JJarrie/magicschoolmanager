<?php

namespace App\Domain\MagicSchool\Wand\WandHeart\Provider;

use App\Domain\MagicSchool\WandHeartConstant;

class DefaultWandHeartProvider implements WandHeartProviderInterface
{
    public function all(): \Traversable
    {
        return new \ArrayIterator([
            WandHeartConstant::UNICORN_HAIR,
            WandHeartConstant::PHOENIX_FEATHER,
            WandHeartConstant::DRAGON_VENTRICLE,
        ]);
    }
}
