<?php

namespace App\Domain\MagicSchool\Wand\EssenceWood\Provider;

class DefaultEssenceWoodProvider implements EssenceWoodProviderInterface
{
    public function all(): \Traversable
    {
        return new \ArrayIterator([

        ]);
    }
}
