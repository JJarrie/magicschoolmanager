<?php

namespace App\Domain\MagicSchool\Student;

use App\Domain\MagicSchool\Identity\Identity;

class Student
{
    private $identity;
    private $currentYear;
    private $house;

    public function __construct(Identity $identity, int $currentYear, string $house)
    {
        $this->identity = $identity;
        $this->currentYear = $currentYear;
        $this->house = $house;
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

}
