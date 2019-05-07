<?php

namespace App\Domain\MagicSchool\Ancestry\Provider;

interface AncestryProviderInterface
{
    public function all(): \Traversable;

    public function random(): string;
}
