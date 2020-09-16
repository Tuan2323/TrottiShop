<?php

namespace App\Repository;

use App\Entity\Trotti;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Trotti|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trotti|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trotti[]    findAll()
 * @method Trotti[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrottiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trotti::class);
    }

    // /**
    //  * @return Trotti[] Returns an array of Trotti objects
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
    public function findOneBySomeField($value): ?Trotti
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
