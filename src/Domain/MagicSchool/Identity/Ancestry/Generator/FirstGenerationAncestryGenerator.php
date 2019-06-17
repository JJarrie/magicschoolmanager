<?php

namespace App\Domain\MagicSchool\Identity\Ancestry\Generator;

use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;
use App\Domain\MagicSchool\Identity\Ancestry\Provider\ParentAncestryProviderInterface;

class FirstGenerationAncestryGenerator implements AncestryGeneratorInterface
{
    private $arrayGenerator;
    private $ancestryProvider;

    public function __construct(ArrayGenerator $arrayGenerator, ParentAncestryProviderInterface $ancestryProvider)
    {
        $this->arrayGenerator = $arrayGenerator;
        $this->ancestryProvider = $ancestryProvider;
    }

    public function generate(): Ancestry
    {
        return new Ancestry($this->arrayGenerator->generate($this->ancestryProvider->all()));
    }
}
