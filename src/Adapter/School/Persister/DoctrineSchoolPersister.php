<?php

namespace App\Adapter\School\Persister;

use App\Domain\School\Persister\SchoolPersisterInterface;
use App\Domain\School\School;
use Doctrine\Common\Persistence\ObjectManager;

class DoctrineSchoolPersister implements SchoolPersisterInterface
{
    private $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function save(School $school): void
    {
        $this->objectManager->persist($school);
        $this->objectManager->flush();
    }
}
