<?php

namespace App\Repository;

use App\Entity\Adminpartenaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Adminpartenaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adminpartenaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adminpartenaire[]    findAll()
 * @method Adminpartenaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminpartenaireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Adminpartenaire::class);
    }

    // /**
    //  * @return Adminpartenaire[] Returns an array of Adminpartenaire objects
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
    public function findOneBySomeField($value): ?Adminpartenaire
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
