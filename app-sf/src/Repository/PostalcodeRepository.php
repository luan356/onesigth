<?php

namespace App\Repository;

use App\Entity\Postalcode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Postalcode>
 *
 * @method Postalcode|null find($id, $lockMode = null, $lockVersion = null)
 * @method Postalcode|null findOneBy(array $criteria, array $orderBy = null)
 * @method Postalcode[]    findAll()
 * @method Postalcode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostalcodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Postalcode::class);
    }

//    /**
//     * @return Postalcode[] Returns an array of Postalcode objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Postalcode
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
