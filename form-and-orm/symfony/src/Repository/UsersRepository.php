<?php

namespace App\Repository;

use App\Entity\UserContacts;
use App\Entity\Users;
use App\RepositoryInterfaces\UserInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\VarDumper\VarDumper;
/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository implements UserInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Users::class);
    }

    // /**
    //  * @return Users[] Returns an array of Users objects
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
    public function findOneBySomeField($value): ?Users
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function editUser()
    {
        $entityManager = $this->getEntityManager();
        $user = $entityManager->getRepository(Users::class)->find(3);
        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id 3'
            );
        }
        $user->setName("yeni isim");
        $entityManager->flush();

    }
    public function deleteUser($id)
    {
        $entityManager = $this->getEntityManager();
        $user = $entityManager->getRepository(Users::class)->find($id);
        $entityManager->remove($user);
        $entityManager->flush();

        VarDumper::dump("silindi");
        exit;
    }
    public function newUser(Users $user)
    {

        $user->setToken("token_bearer");
        $entityManager = $this->getEntityManager();
        $entityManager->persist($user);
        $entityManager->flush();


    }
    public function getUserAccountById() :Users
    {
        $user = $this->findOneBy(['id' =>1]);
        return $user;
       // VarDumper::dump($user);
      //  exit;
    }
    public function fetchUsersAccounts()
    {
        $users = $this->findAll();
        VarDumper::dump($users);
        exit;
    }
    public function getUserContactById()
    {
        $entityManager = $this->getEntityManager();
        $qb = $entityManager->createQueryBuilder();
        $qb->select('contacts')
            ->from(UserContacts::class, 'contacts')
            ->where('contacts.user_id = 2');
        $query = $qb->getQuery();
        $result = $query->getResult();
         VarDumper::dump($result);

          exit;
    }
    public function fetchUsersContacts()
    {
        $entityManager = $this->getEntityManager();
        $qb = $entityManager->createQueryBuilder();
        $qb->select('contacts','user_id')
            ->from(UserContacts::class, 'contacts')
            ->innerJoin('contacts.user_id','user_id');
        $query = $qb->getQuery();
        $result = $query->getResult();
        VarDumper::dump($result);
        exit;
    }
}
