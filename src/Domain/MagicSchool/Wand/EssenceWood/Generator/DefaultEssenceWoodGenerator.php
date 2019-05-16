<?php

namespace App\Domain\MagicSchool\Wand\EssenceWood\Generator;

use App\Domain\Generator\InProviderGenerator;
use App\Domain\MagicSchool\Wand\EssenceWood\Provider\EssenceWoodProviderInterface;

class DefaultEssenceWoodGenerator extends InProviderGenerator implements EssenceWoodGeneratorInterface
{
    public function __construct(EssenceWoodProviderInterface $provider)
    {
        parent::__construct($provider);
    }

    public function generate(): string
    {
        return parent::generate();
    }
}
