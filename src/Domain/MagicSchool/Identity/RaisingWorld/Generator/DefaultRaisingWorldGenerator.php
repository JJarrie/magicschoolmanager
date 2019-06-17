<?php

namespace App\Domain\MagicSchool\Identity\RaisingWorld\Generator;

use App\Domain\Generator\ArrayGenerator;
use App\Domain\MagicSchool\Identity\RaisingWorld\Provider\RaisingWorldProviderInterface;

class DefaultRaisingWorldGenerator implements RaisingWorldGeneratorInterface
{
    private $arrayGenerator;
    private $raisingWorldProvider;

    public function __construct(ArrayGenerator $arrayGenerator, RaisingWorldProviderInterface $raisingWorldProvider)
    {
        $this->arrayGenerator = $arrayGenerator;
        $this->raisingWorldProvider = $raisingWorldProvider;
    }

    public function generate(): string
    {
        return $this->arrayGenerator->generate($this->raisingWorldProvider->all());
    }
}
