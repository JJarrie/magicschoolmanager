<?php

namespace App\Domain\MagicSchool\Identity\RaisingWorld\Resolver;

use App\Domain\MagicSchool\BloodStatusConstant;
use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;
use App\Domain\MagicSchool\Identity\RaisingWorld\Generator\RaisingWorldGeneratorInterface;
use App\Domain\MagicSchool\RaisingWorldConstant;

class DefaultRaisingWorldResolver implements RaisingWorldResolverInterface
{
    private $raisingWorldGenerator;

    public function __construct(RaisingWorldGeneratorInterface $raisingWorldGenerator)
    {
        $this->raisingWorldGenerator = $raisingWorldGenerator;
    }

    public function resolve(Ancestry $ancestry): string
    {
        switch ($ancestry->getAncestry()) {
            case BloodStatusConstant::PURE_BLOOD:
            case BloodStatusConstant::WIZARD:
                return RaisingWorldConstant::WIZARDS_WORLD;
            case BloodStatusConstant::MUGGLE_BORN:
                return RaisingWorldConstant::MUGGLES_WORLD;
            default:
                return $this->raisingWorldGenerator->generate();
        }
    }
}
