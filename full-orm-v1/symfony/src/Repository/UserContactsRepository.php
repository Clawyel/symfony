<?php

namespace App\Repository;

use App\Entity\UserContacts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserContacts|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserContacts|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserContacts[]    findAll()
 * @method UserContacts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserContactsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserContacts::class);
    }

    // /**
    //  * @return UserContacts[] Returns an array of UserContacts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserContacts
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
