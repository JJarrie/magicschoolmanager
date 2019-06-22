<?php

namespace App\Adapter\School\Repository;

use App\Domain\MagicSchool\School\Repository\SchoolRepositoryInterface;
use App\Domain\MagicSchool\School\School;
use App\Entity\School\SchoolEntity;
use Doctrine\Common\Persistence\ObjectManager;

class DoctrineSchoolRepository implements SchoolRepositoryInterface
{
    private ObjectManager $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function save(School $school): void
    {
        $doctrineSchoolEntity = new SchoolEntity($school->getId(), $school->getName());
        $this->objectManager->persist($doctrineSchoolEntity);
        $this->objectManager->flush();
    }
}
