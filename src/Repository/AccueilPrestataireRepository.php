<?php

namespace App\Repository;

use App\Entity\AccueilPrestataire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AccueilPrestataire|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccueilPrestataire|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccueilPrestataire[]    findAll()
 * @method AccueilPrestataire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccueilPrestataireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AccueilPrestataire::class);
    }

    // /**
    //  * @return AccueilPrestataire[] Returns an array of AccueilPrestataire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AccueilPrestataire
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
