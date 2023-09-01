<?php

namespace App\Repository;

use App\Entity\REvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<REvent>
 *
 * @method REvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method REvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method REvent[]    findAll()
 * @method REvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class REventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, REvent::class);
    }

//    /**
//     * @return REvent[] Returns an array of REvent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?REvent
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
