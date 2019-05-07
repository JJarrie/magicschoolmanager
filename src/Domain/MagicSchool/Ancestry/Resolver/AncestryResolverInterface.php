<?php

namespace App\Domain\MagicSchool\Ancestry\Resolver;

use App\Domain\MagicSchool\Ancestry\AncestryInterface;

interface AncestryResolverInterface
{
    public function resolve(AncestryInterface $motherAncestryValue, AncestryInterface $fatherAncestryValue): string;
}
