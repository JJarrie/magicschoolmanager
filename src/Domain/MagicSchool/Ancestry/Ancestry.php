<?php

namespace App\Domain\MagicSchool\Ancestry;

class Ancestry implements AncestryInterface
{
    private $ancestry;
    private $motherAncestry;
    private $fatherAncestry;

    public function __construct(string $ancestry, ?AncestryInterface $motherAncestry = null, ?AncestryInterface $fatherAncestry = null)
    {
        $this->ancestry = $ancestry;
        $this->motherAncestry = $motherAncestry;
        $this->fatherAncestry = $fatherAncestry;
    }

    public function getAncestry(): string
    {
        return $this->ancestry;
    }

    public function getMotherAncestry(): ?AncestryInterface
    {
        return $this->motherAncestry;
    }

    public function getFatherAncestry(): ?AncestryInterface
    {
        return $this->fatherAncestry;
    }
}
