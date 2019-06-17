<?php

namespace App\Domain\MagicSchool\Identity\Ancestry;

class Ancestry
{
    private $ancestry;
    private $motherAncestry;
    private $fatherAncestry;

    public function __construct(string $ancestry, ?Ancestry $motherAncestry = null, ?Ancestry $fatherAncestry = null)
    {
        $this->ancestry = $ancestry;
        $this->motherAncestry = $motherAncestry;
        $this->fatherAncestry = $fatherAncestry;
    }

    public function getAncestry(): string
    {
        return $this->ancestry;
    }

    public function getMotherAncestry(): ?Ancestry
    {
        return $this->motherAncestry;
    }

    public function getFatherAncestry(): ?Ancestry
    {
        return $this->fatherAncestry;
    }
}
