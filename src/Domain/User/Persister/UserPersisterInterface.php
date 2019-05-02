<?php

namespace App\Domain\User\Persister;

use App\Domain\User\UserInterface;

interface UserPersisterInterface
{
    public function save(UserInterface $user): void;
}
