<?php

namespace App\Repository;

use App\Entity\MessageVariable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MessageVariable|null find($id, $lockMode = null, $lockVersion = null)
 * @method MessageVariable|null findOneBy(array $criteria, array $orderBy = null)
 * @method MessageVariable[]    findAll()
 * @method MessageVariable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageVariableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessageVariable::class);
    }

    // /**
    //  * @return MessageVariable[] Returns an array of MessageVariable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function gg($value,$value2)
    {
        return $this->createQueryBuilder('c')
            ->Where('c.nom = :val')
            ->andWhere('c.idUser  = :vale')
            ->setParameters(array('val'=> $value, 'vale' => $value2))
//            ->setParameter('val', $value)
//            ->setParameter('vale', $value2)
            ->getQuery()
            ->getResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?MessageVariable
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
