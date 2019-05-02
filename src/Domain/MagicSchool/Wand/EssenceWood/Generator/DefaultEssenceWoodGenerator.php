<?php

namespace App\Domain\MagicSchool\Wand\EssenceWood\Generator;

use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\Wand\EssenceWood\Provider\EssenceWoodProviderInterface;

class DefaultEssenceWoodGenerator implements EssenceWoodGeneratorInterface
{
    private ArrayGenerator $arrayGenerator;
    private EssenceWoodProviderInterface $essenceWoodProvider;

    public function __construct(ArrayGenerator $arrayGenerator, EssenceWoodProviderInterface $essenceWoodProvider)
    {
        $this->arrayGenerator = $arrayGenerator;
        $this->essenceWoodProvider = $essenceWoodProvider;
    }

    public function generate(): string
    {
        return $this->arrayGenerator->generate($this->essenceWoodProvider->all());
    }
}
