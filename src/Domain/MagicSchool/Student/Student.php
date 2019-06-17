<?php

namespace App\Domain\MagicSchool\Student;

use App\Domain\MagicSchool\Characteristics\Characteristics;
use App\Domain\MagicSchool\Identity\Identity;
use App\Domain\MagicSchool\Skills\Skills;
use App\Domain\MagicSchool\Wand\Wand;

class Student
{
    private $identity;
    private $currentYear;
    private $house;
    private $characteristics;
    private $skills;
    private $wand;

    public function __construct(Identity $identity, int $currentYear, string $house, Characteristics $characteristics, Skills $skills, Wand $wand)
    {
        $this->identity = $identity;
        $this->currentYear = $currentYear;
        $this->house = $house;
        $this->characteristics = $characteristics;
        $this->skills = $skills;
        $this->wand = $wand;
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

    public function getSkills(): Skills
    {
        return $this->skills;
    }

    public function getWand(): Wand
    {
        return $this->wand;
    }
}
