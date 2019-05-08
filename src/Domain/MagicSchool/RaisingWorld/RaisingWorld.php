<?php

namespace App\Domain\MagicSchool\RaisingWorld;

class RaisingWorld implements RaisingWorldInterface
{
    private $world;

    public function __construct(string $world)
    {
        $this->world = $world;
    }

    public function getWorld(): string
    {
        return $this->world;
    }
}
