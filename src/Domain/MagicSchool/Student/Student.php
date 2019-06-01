<?php

namespace App\Domain\MagicSchool\Student;

use App\Domain\MagicSchool\Characteristics\Characteristics;
use App\Domain\MagicSchool\Identity\Identity;

class Student
{
    private $identity;
    private $currentYear;
    private $house;
    private $characteristics;

    public function __construct(Identity $identity, int $currentYear, string $house, Characteristics $characteristics)
    {
        $this->identity = $identity;
        $this->currentYear = $currentYear;
        $this->house = $house;
        $this->characteristics = $characteristics;
    }

    public function getIdentity(): Identity
    {
        return $this->identity;
    }

    public function getCurrentYear(): int
    {
        return $this->currentYear;
    }

    public function getHouse(): string
    {
        return $this->house;
    }

    public function getCharacteristics(): Characteristics
    {
        return $this->characteristics;
    }
}
