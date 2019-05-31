<?php

namespace App\Domain\MagicSchool\Wand\WandSize\Provider;

class DefaultWandSizeProvider implements WandSizeProviderInterface
{
    public function all(): \Traversable
    {
        return new \ArrayIterator(range(22, 36));
    }
}
