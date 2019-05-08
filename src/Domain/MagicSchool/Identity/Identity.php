<?php

namespace App\Domain\MagicSchool\Identity;

class Identity implements IdentityInterface
{
    private $gender;
    private $firstName;
    private $lastName;
    private $birthdayDate;

    public function __construct(string $gender, string $firstName, string $lastName, \DateTime $birthdayDate)
    {
        $this->gender = $gender;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdayDate = $birthdayDate;
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

    public function getBirthdayDate(): \DateTime
    {
        return $this->birthdayDate;
    }
}
