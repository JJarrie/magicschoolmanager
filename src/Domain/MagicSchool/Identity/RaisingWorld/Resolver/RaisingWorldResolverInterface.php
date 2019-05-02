<?php

namespace App\Domain\MagicSchool\Identity\RaisingWorld\Resolver;

use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;

interface RaisingWorldResolverInterface
{
    public function resolve(Ancestry $ancestry): string;
}
