<?php

namespace App\Repository;

use App\Entity\SalleDeVente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SalleDeVente|null find($id, $lockMode = null, $lockVersion = null)
 * @method SalleDeVente|null findOneBy(array $criteria, array $orderBy = null)
 * @method SalleDeVente[]    findAll()
 * @method SalleDeVente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalleDeVenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SalleDeVente::class);
    }

    // /**
    //  * @return SalleDeVente[] Returns an array of SalleDeVente objects
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
    public function findOneBySomeField($value): ?SalleDeVente
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
