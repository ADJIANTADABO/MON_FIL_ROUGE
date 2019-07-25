<?php

namespace App\Repository;

use App\Entity\Comptebank;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Comptebank|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comptebank|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comptebank[]    findAll()
 * @method Comptebank[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComptebankRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comptebank::class);
    }

    // /**
    //  * @return Comptebank[] Returns an array of Comptebank objects
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
    public function findOneBySomeField($value): ?Comptebank
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
