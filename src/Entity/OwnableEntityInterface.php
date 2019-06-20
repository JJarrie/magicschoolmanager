<?php

namespace App\Entity;

interface OwnableEntityInterface
{
    public function getUser(): ?User;

    public function setUser(User $user): void;
}
