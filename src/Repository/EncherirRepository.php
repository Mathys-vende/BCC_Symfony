<?php

namespace App\Repository;

use App\Entity\Encherir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Encherir|null find($id, $lockMode = null, $lockVersion = null)
 * @method Encherir|null findOneBy(array $criteria, array $orderBy = null)
 * @method Encherir[]    findAll()
 * @method Encherir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EncherirRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Encherir::class);
    }

    // /**
    //  * @return Encherir[] Returns an array of Encherir objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Encherir
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    */
    public function BestEnchere($idVente)
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT e 
            FROM App\Entity\Encherir e
            WHERE (e.idVente = :id)
            ORDER BY e.prixPropose DESC'
        )->setParameter('id', $idVente)->setMaxResults(1)
            ->getResult();

        return $query;
    }

    public function EnchereAcheteur($idAcheteur)
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT e 
            FROM App\Entity\Encherir e
            WHERE (e.idAcheteur = :id)
            GROUP BY e.idVente
            ORDER BY e.date DESC'
        )->setParameter('id', $idAcheteur)
            ->getResult();

        return $query;
    }
}
