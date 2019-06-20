<?php

namespace App\Repository;

use App\Entity\School;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method School findOneBy(array $criteria, array $orderBy = null)
 */
class SchoolRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, School::class);
    }

    public function listByUser(User $user): array
    {
        return $this->createQueryBuilder('c')
                    ->where('c.user = :user')
                    ->setParameter('user', $user)
                    ->getQuery()
                    ->getResult()
            ;
    }
}
