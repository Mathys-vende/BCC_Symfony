<?php

namespace App\Repository;

use App\Entity\CommissairePriseur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommissairePriseur|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommissairePriseur|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommissairePriseur[]    findAll()
 * @method CommissairePriseur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommissairePriseurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommissairePriseur::class);
    }

    // /**
    //  * @return CommissairePriseur[] Returns an array of CommissairePriseur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommissairePriseur
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
