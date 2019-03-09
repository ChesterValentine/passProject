<?php

namespace App\Repository;

use App\Entity\ContenuVisiteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContenuVisiteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContenuVisiteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContenuVisiteur[]    findAll()
 * @method ContenuVisiteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenuVisiteurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContenuVisiteur::class);
    }

    // /**
    //  * @return ContenuVisiteur[] Returns an array of ContenuVisiteur objects
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
    public function findOneBySomeField($value): ?ContenuVisiteur
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
