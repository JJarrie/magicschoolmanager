<?php

namespace App\Infrastructure\User\Persister;

use App\Domain\User\Persister\UserPersisterInterface;
use App\Domain\User\UserInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DoctrineUserPersister implements UserPersisterInterface
{
    private $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function save(UserInterface $user): void
    {
        $this->objectManager->persist($user);
        $this->objectManager->flush();
    }
}
