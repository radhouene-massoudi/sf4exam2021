<?php

namespace App\Repository;

use App\Entity\TicketPeage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TicketPeage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketPeage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketPeage[]    findAll()
 * @method TicketPeage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketPeageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketPeage::class);
    }

    // /**
    //  * @return TicketPeage[] Returns an array of TicketPeage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TicketPeage
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
