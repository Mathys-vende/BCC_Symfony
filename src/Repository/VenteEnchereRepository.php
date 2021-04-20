<?php

namespace App\Repository;

use App\Entity\VenteEnchere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VenteEnchere|null find($id, $lockMode = null, $lockVersion = null)
 * @method VenteEnchere|null findOneBy(array $criteria, array $orderBy = null)
 * @method VenteEnchere[]    findAll()
 * @method VenteEnchere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VenteEnchereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VenteEnchere::class);
    }

    // /**
    //  * @return VenteEnchere[] Returns an array of VenteEnchere objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VenteEnchere
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
