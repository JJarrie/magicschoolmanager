<?php

namespace App\Domain\School;

class School
{
    private $name;

    public function __construct(?string $name = null)
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
