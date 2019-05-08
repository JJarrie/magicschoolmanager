<?php

namespace App\Domain\MagicSchool\RaisingWorld\Resolver;

use App\Domain\MagicSchool\Ancestry\AncestryInterface;
use App\Domain\MagicSchool\RaisingWorld\RaisingWorldInterface;

interface RaisingWorldResolverInterface
{
    public function resolve(AncestryInterface $ancestry): RaisingWorldInterface;
}
