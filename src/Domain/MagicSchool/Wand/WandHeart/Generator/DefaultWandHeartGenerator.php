<?php

namespace App\Domain\MagicSchool\Wand\WandHeart\Generator;

use App\Domain\Generator\InProviderGenerator;
use App\Domain\MagicSchool\Wand\WandHeart\Provider\WandHeartProviderInterface;

class DefaultWandHeartGenerator extends InProviderGenerator implements WandHeartGeneratorInterface
{
    public function __construct(WandHeartProviderInterface $provider)
    {
        parent::__construct($provider);
    }
}
