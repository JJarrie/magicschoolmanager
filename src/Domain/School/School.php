<?php

namespace App\Domain\MagicSchool\School;

class School
{
    public ?string $name;

    public function __construct(?string $name = null)
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
