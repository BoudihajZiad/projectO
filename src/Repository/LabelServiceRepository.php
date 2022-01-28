<?php

namespace App\Repository;

use App\Entity\LabelService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LabelService|null find($id, $lockMode = null, $lockVersion = null)
 * @method LabelService|null findOneBy(array $criteria, array $orderBy = null)
 * @method LabelService[]    findAll()
 * @method LabelService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LabelServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LabelService::class);
    }

    // /**
    //  * @return LabelService[] Returns an array of LabelService objects
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
    public function findOneBySomeField($value): ?LabelService
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
