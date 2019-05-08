<?php

namespace App\Domain\MagicSchool\Ancestry\Generator;

use App\Domain\Generator\InProviderGenerator;
use App\Domain\MagicSchool\Ancestry\Ancestry;
use App\Domain\MagicSchool\Ancestry\AncestryInterface;
use App\Domain\MagicSchool\Ancestry\Provider\AncestryProviderInterface;

class FirstGenerationAncestryGenerator extends InProviderGenerator implements AncestryGeneratorInterface
{
    public function __construct(AncestryProviderInterface $ancestryProvider)
    {
        parent::__construct($ancestryProvider);
    }

    public function generate(): AncestryInterface
    {
        return new Ancestry(parent::generate());
    }
}
