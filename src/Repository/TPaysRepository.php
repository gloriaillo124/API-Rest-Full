<?php

namespace App\Repository;

use App\Entity\TPays;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TPays>
 *
 * @method TPays|null find($id, $lockMode = null, $lockVersion = null)
 * @method TPays|null findOneBy(array $criteria, array $orderBy = null)
 * @method TPays[]    findAll()
 * @method TPays[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TPaysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TPays::class);
    }

//    /**
//     * @return TPays[] Returns an array of TPays objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TPays
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
