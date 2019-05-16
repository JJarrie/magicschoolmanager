<?php

namespace App\Domain\MagicSchool\Wand\WandSize\Generator;

use App\Domain\Generator\InProviderGenerator;
use App\Domain\MagicSchool\Wand\WandSize\Provider\WandSizeProviderInterface;

class DefaultWandSizeGenerator extends InProviderGenerator implements WandSizeGeneratorInterface
{
    public function __construct(WandSizeProviderInterface $provider)
    {
        parent::__construct($provider);
    }
}
