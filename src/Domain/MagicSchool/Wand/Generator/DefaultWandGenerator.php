<?php

namespace App\Domain\MagicSchool\Wand\Generator;

use App\Domain\MagicSchool\Wand\EssenceWood\Generator\EssenceWoodGeneratorInterface;
use App\Domain\MagicSchool\Wand\Wand;
use App\Domain\MagicSchool\Wand\WandHeart\Generator\WandHeartGeneratorInterface;
use App\Domain\MagicSchool\Wand\WandSize\Generator\WandSizeGeneratorInterface;

class DefaultWandGenerator implements WandGeneratorInterface
{
    private $essenceWoodGenerator;
    private $wandHeartGenerator;
    private $wandSizeGenerator;

    public function __construct(EssenceWoodGeneratorInterface $essenceWoodGenerator, WandHeartGeneratorInterface $wandHeartGenerator, WandSizeGeneratorInterface $wandSizeGenerator)
    {
        $this->essenceWoodGenerator = $essenceWoodGenerator;
        $this->wandHeartGenerator = $wandHeartGenerator;
        $this->wandSizeGenerator = $wandSizeGenerator;
    }

    public function generate(): Wand
    {
        return new Wand(
            $this->essenceWoodGenerator->generate(),
            $this->wandSizeGenerator->generate(),
            $this->wandHeartGenerator->generate()
        );
    }
}
