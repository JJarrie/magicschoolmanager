<?php

namespace App\Domain\MagicSchool\Identity;

use App\Domain\MagicSchool\Identity\Ancestry\Ancestry;

class Identity
{
    private $gender;
    private $firstName;
    private $lastName;
    private $birthdayDate;
    private $ancestry;
    private $raisingWorld;

    public function __construct(string $gender, string $firstName, string $lastName, \DateTimeImmutable $birthdayDate, Ancestry $ancestry, string $raisingWorld)
    {
        $this->gender = $gender;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdayDate = $birthdayDate;
        $this->ancestry = $ancestry;
        $this->raisingWorld = $raisingWorld;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getBirthdayDate(): \DateTimeImmutable
    {
        return $this->birthdayDate;
    }

    public function getAncestry(): Ancestry
    {
        return $this->ancestry;
    }

    public function getRaisingWorld(): string
    {
        return $this->raisingWorld;
    }
}
