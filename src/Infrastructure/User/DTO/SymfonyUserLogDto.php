<?php

namespace App\Infrastructure\User\DTO;

class SymfonyUserLogDto
{
    private string $username;
    private string $password;
    private string $csrfTokenValue;

    public function __construct(string $username, string $password, string $csrfTokenValue)
    {
        $this->username = $username;
        $this->password = $password;
        $this->csrfTokenValue = $csrfTokenValue;
    }

    public function getCsrfTokenValue(): string
    {
        return $this->csrfTokenValue;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
