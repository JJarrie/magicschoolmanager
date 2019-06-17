<?php

namespace App\Domain\MagicSchool\Wand;

class Wand
{
    private $essenceWood;
    private $size;
    private $hearth;

    public function __construct(string $essence, int $size, string $hearth)
    {
        $this->essenceWood = $essence;
        $this->size = $size;
        $this->hearth = $hearth;
    }

    public function getEssenceWood(): string
    {
        return $this->essenceWood;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getHearth(): string
    {
        return $this->hearth;
    }
}
