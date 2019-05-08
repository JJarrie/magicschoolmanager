<?php

namespace App\Domain\MagicSchool\RaisingWorld\Generator;

use App\Domain\Generator\InProviderGenerator;
use App\Domain\MagicSchool\RaisingWorld\Provider\RaisingWorldProviderInterface;
use App\Domain\MagicSchool\RaisingWorld\RaisingWorld;

class DefaultRaisingWorldGenerator extends InProviderGenerator implements RaisingWorldGeneratorInterface
{
    public function __construct(RaisingWorldProviderInterface $raisingWorldProvider)
    {
        parent::__construct($raisingWorldProvider);
    }

    public function generate(): RaisingWorld
    {
        return new RaisingWorld(parent::generate());
    }
}
