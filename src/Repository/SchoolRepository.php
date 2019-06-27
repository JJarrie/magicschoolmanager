<?php

namespace App\Repository;

use App\Entity\School\SchoolEntity;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SchoolEntity findOneBy(array $criteria, array $orderBy = null)
 */
class SchoolRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SchoolEntity::class);
    }

    public function listByUser(User $owner): array
    {
        return $this->createQueryBuilder('c')
                    ->where('c.owner = :owner')
                    ->setParameter('owner', $owner)
                    ->getQuery()
                    ->getResult()
            ;
    }
}
