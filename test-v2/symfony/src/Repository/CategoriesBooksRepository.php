<?php

namespace App\Repository;

use App\Entity\CategoriesBooks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CategoriesBooks|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriesBooks|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriesBooks[]    findAll()
 * @method CategoriesBooks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesBooksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriesBooks::class);
    }

    // /**
    //  * @return CategoriesBooks[] Returns an array of CategoriesBooks objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoriesBooks
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
