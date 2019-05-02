<?php

namespace App\Adapter\School\Persister;

use App\Domain\School\Persister\SchoolPersisterInterface;
use App\Domain\School\School;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineSchoolPersister implements SchoolPersisterInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(School $school): void
    {
        $this->entityManager->persist($school);
        $this->entityManager->flush();
    }
}
