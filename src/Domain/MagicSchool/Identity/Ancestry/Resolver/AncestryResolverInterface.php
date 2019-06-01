<?php

namespace App\Domain\MagicSchool\Identity\Ancestry\Resolver;

use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;

interface AncestryResolverInterface
{
    public function resolve(Ancestry $motherAncestryValue, Ancestry $fatherAncestryValue): string;
}
