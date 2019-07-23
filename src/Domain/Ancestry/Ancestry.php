<?php

namespace App\Domain\Ancestry;

/**
 * @author Jérémy JARRIÉ <jeremy.jarrie@sensiolabs.com>
 */
class Ancestry
{
    private $name;
    private $breedingWorld;

    public function __construct(string $name, string $breedingWorld)
    {
        $this->name = $name;
        $this->breedingWorld = $breedingWorld;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBreedingWorld(): string
    {
        return $this->breedingWorld;
    }
}
