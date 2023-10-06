<?php

namespace App\Repository;

use App\Entity\UsersAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsersAccount>
 *
 * @method UsersAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersAccount[]    findAll()
 * @method UsersAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersAccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersAccount::class);
    }

//    /**
//     * @return UsersAccount[] Returns an array of UsersAccount objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UsersAccount
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
