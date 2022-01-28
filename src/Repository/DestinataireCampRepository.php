<?php

namespace App\Repository;

use App\Entity\DestinataireCamp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DestinataireCamp|null find($id, $lockMode = null, $lockVersion = null)
 * @method DestinataireCamp|null findOneBy(array $criteria, array $orderBy = null)
 * @method DestinataireCamp[]    findAll()
 * @method DestinataireCamp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DestinataireCampRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DestinataireCamp::class);
    }

    // /**
    //  * @return DestinataireCamp[] Returns an array of DestinataireCamp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DestinataireCamp
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
