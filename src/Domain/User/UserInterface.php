<?php

namespace App\Domain\User;

use App\Domain\User\DTO\CreateUserDto;

interface UserInterface
{
    public function getFirstname(): string;

    public function getLastname(): string;

    public function getUsername(): string;

    public static function createFromCreateDto(CreateUserDto $createUserDTO);
}
