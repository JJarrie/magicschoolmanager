<?php

namespace App\Domain\MagicSchool\Wand\WandSize\Provider;

class DefaultWandSizeProvider implements WandSizeProviderInterface
{
    public function all(): array
    {
        return range(22, 36);
    }
}
