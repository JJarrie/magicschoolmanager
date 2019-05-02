<?php

namespace App\Infrastructure\User\Persister;

use App\Domain\User\Persister\UserPersisterInterface;
use App\Domain\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineUserPersister implements UserPersisterInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(UserInterface $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
