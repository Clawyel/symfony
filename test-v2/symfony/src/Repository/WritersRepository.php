<?php

namespace App\Repository;

use App\Entity\Writers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Writers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Writers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Writers[]    findAll()
 * @method Writers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WritersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Writers::class);
    }

    // /**
    //  * @return Writers[] Returns an array of Writers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Writers
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
