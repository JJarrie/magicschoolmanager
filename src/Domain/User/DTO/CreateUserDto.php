<?php

namespace App\Domain\User\DTO;

class CreateUserDto
{
    private $firstname;
    private $lastname;
    private $username;
    private $password;
    private $roles;

    public function __construct(string $firstname, string $lastname, string $username, string $password, array $roles)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}
