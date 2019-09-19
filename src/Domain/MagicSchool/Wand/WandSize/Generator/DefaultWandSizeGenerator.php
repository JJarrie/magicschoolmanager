<?php

namespace App\Domain\MagicSchool\Wand\WandSize\Generator;

use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\Wand\WandSize\Provider\WandSizeProviderInterface;

class DefaultWandSizeGenerator implements WandSizeGeneratorInterface
{
    private ArrayGenerator $arrayGenerator;
    private WandSizeProviderInterface $wandSizeProvider;

    public function __construct(ArrayGenerator $arrayGenerator, WandSizeProviderInterface $wandSizeProvider)
    {
        $this->arrayGenerator = $arrayGenerator;
        $this->wandSizeProvider = $wandSizeProvider;
    }

    public function generate(): int
    {
        return $this->arrayGenerator->generate($this->wandSizeProvider->all());
    }
}
