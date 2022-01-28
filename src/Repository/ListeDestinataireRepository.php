<?php

namespace App\Repository;

use App\Entity\ListeDestinataire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeDestinataire|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeDestinataire|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeDestinataire[]    findAll()
 * @method ListeDestinataire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeDestinataireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeDestinataire::class);
    }

    // /**
    //  * @return ListeDestinataire[] Returns an array of ListeDestinataire objects
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

    public function deleAll()
    {
        return $this->createQueryBuilder('c')
            ->delete()
            ->getQuery()
            ->getResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?ListeDestinataire
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
