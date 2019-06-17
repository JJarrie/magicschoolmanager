<?php

namespace App\Domain\MagicSchool\Wand\WandHeart\Generator;

use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\Wand\WandHeart\Provider\WandHeartProviderInterface;

class DefaultWandHeartGenerator implements WandHeartGeneratorInterface
{
    private $arrayGenerator;
    private $wandHeartProvider;

    public function __construct(ArrayGenerator $arrayGenerator, WandHeartProviderInterface $wandHeartProvider)
    {
        $this->arrayGenerator = $arrayGenerator;
        $this->wandHeartProvider = $wandHeartProvider;
    }

    public function generate(): string
    {
        return $this->arrayGenerator->generate($this->wandHeartProvider->all());
    }
}
