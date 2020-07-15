<?php

namespace App\Repository;

use App\Entity\StarsEuromillion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StarsEuromillion|null find($id, $lockMode = null, $lockVersion = null)
 * @method StarsEuromillion|null findOneBy(array $criteria, array $orderBy = null)
 * @method StarsEuromillion[]    findAll()
 * @method StarsEuromillion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StarsEuromillionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StarsEuromillion::class);
    }

    // /**
    //  * @return StarsEuromillion[] Returns an array of StarsEuromillion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StarsEuromillion
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
