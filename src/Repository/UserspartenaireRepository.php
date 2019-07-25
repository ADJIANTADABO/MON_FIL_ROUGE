<?php

namespace App\Repository;

use App\Entity\Userspartenaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Userspartenaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Userspartenaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Userspartenaire[]    findAll()
 * @method Userspartenaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserspartenaireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Userspartenaire::class);
    }

    // /**
    //  * @return Userspartenaire[] Returns an array of Userspartenaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Userspartenaire
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
