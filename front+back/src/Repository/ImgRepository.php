<?php

namespace App\Repository;

use App\Entity\Img;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Img|null find($id, $lockMode = null, $lockVersion = null)
 * @method Img|null findOneBy(array $criteria, array $orderBy = null)
 * @method Img[]    findAll()
 * @method Img[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImgRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Img::class);
    }

//    /**
//     * @return Img[] Returns an array of Img objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Img
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
