<?php

namespace App\Domain\MagicSchool\Ancestry;

interface AncestryInterface
{
    public function getMotherAncestry(): ?AncestryInterface;

    public function getFatherAncestry(): ?AncestryInterface;

    public function getAncestry(): string;
}
