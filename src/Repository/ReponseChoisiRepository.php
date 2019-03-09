<?php

namespace App\Repository;

use App\Entity\ReponseChoisi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReponseChoisi|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReponseChoisi|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReponseChoisi[]    findAll()
 * @method ReponseChoisi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseChoisiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReponseChoisi::class);
    }

    // /**
    //  * @return ReponseChoisi[] Returns an array of ReponseChoisi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReponseChoisi
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
