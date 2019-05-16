<?php

namespace App\Domain\MagicSchool\Wand\WandSize\Provider;

use App\Domain\MagicSchool\Wand\WandHeart\Provider\WandHeartProviderInterface;

class DefaultWandSizeProvider implements WandHeartProviderInterface
{
    public function all(): \Traversable
    {
        return new \ArrayIterator(range(22, 36));
    }

}
