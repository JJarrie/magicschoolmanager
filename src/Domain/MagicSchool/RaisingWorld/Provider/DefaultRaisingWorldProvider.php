<?php

namespace App\Domain\MagicSchool\RaisingWorld\Provider;

use App\Domain\MagicSchool\RaisingWorldConstant;

class DefaultRaisingWorldProvider implements RaisingWorldProviderInterface
{
    public function all(): \Traversable
    {
        return new \ArrayIterator([RaisingWorldConstant::MUGGLES_WORLD, RaisingWorldConstant::WIZARDS_WORLD]);
    }
}
