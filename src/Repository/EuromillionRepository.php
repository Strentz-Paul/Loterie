<?php

namespace App\Repository;

use App\Entity\Euromillion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Euromillion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Euromillion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Euromillion[]    findAll()
 * @method Euromillion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EuromillionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Euromillion::class);
    }

    // /**
    //  * @return Euromillion[] Returns an array of Euromillion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Euromillion
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
