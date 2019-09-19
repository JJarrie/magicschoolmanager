<?php

namespace App\Domain\School;

class School
{
    private string $name;

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
