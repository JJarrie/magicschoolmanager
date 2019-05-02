<?php

namespace App\Domain\User\Repository;

use App\Domain\User\UserInterface;

interface UserRepositoryInterface
{
    public function findOneByUsername(string $username): ?UserInterface;
}
