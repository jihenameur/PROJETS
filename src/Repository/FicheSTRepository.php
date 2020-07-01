<?php

namespace App\Repository;

use App\Entity\FicheST;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FicheST|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheST|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheST[]    findAll()
 * @method FicheST[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheSTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FicheST::class);
    }

    // /**
    //  * @return FicheST[] Returns an array of FicheST objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FicheST
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
