<?php

namespace App\Domain\MagicSchool\RaisingWorld\Generator;

use App\Domain\MagicSchool\RaisingWorld\RaisingWorld;

interface RaisingWorldGeneratorInterface
{
    public function generate(): RaisingWorld;
}
