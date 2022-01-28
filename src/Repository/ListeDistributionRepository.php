<?php

namespace App\Repository;

use App\Entity\ListeDistribution;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeDistribution|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeDistribution|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeDistribution[]    findAll()
 * @method ListeDistribution[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeDistributionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeDistribution::class);
    }

    // /**
    //  * @return ListeDistribution[] Returns an array of ListeDistribution objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeDistribution
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
