<?php

namespace App\Adapter\School\Repository;

use App\Domain\School\Repository\SchoolRepositoryInterface;
use App\Domain\School\School;
use App\Entity\School\SchoolEntity;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\Security;

class DoctrineSchoolRepository implements SchoolRepositoryInterface
{
    private ObjectManager $objectManager;
    private Security $security;

    public function __construct(ObjectManager $objectManager, Security $security)
    {
        $this->objectManager = $objectManager;
        $this->security = $security;
    }

    public function save(School $school): void
    {
        $doctrineSchoolEntity = new SchoolEntity(Uuid::uuid4(), $school->getName(), $this->security->getUser());
        $this->objectManager->persist($doctrineSchoolEntity);
        $this->objectManager->flush();
    }
}
