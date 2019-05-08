<?php

namespace App\Domain\MagicSchool\RaisingWorld\Resolver;

use App\Domain\MagicSchool\Ancestry\AncestryInterface;
use App\Domain\MagicSchool\BloodStatusConstant;
use App\Domain\MagicSchool\RaisingWorld\Generator\RaisingWorldGeneratorInterface;
use App\Domain\MagicSchool\RaisingWorld\RaisingWorld;
use App\Domain\MagicSchool\RaisingWorld\RaisingWorldInterface;
use App\Domain\MagicSchool\RaisingWorldConstant;

class DefaultRaisingWorldResolver implements RaisingWorldResolverInterface
{
    private $raisingWorldGenerator;

    public function __construct(RaisingWorldGeneratorInterface $raisingWorldGenerator)
    {
        $this->raisingWorldGenerator = $raisingWorldGenerator;
    }

    public function resolve(AncestryInterface $ancestry): RaisingWorldInterface
    {
        switch ($ancestry->getAncestry()) {
            case BloodStatusConstant::PURE_BLOOD:
            case BloodStatusConstant::WIZARD:
                return new RaisingWorld(RaisingWorldConstant::WIZARDS_WORLD);
            case BloodStatusConstant::MUGGLE_BORN:
                return new RaisingWorld(RaisingWorldConstant::MUGGLES_WORLD);
            default:
                return new RaisingWorld($this->raisingWorldGenerator->generate());
        }
    }
}
