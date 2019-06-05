<?php

namespace App\Repository;

use App\Entity\QCMAnswers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method QCMAnswers|null find($id, $lockMode = null, $lockVersion = null)
 * @method QCMAnswers|null findOneBy(array $criteria, array $orderBy = null)
 * @method QCMAnswers[]    findAll()
 * @method QCMAnswers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QCMAnswersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, QCMAnswers::class);
    }

    // /**
    //  * @return QCMAnswers[] Returns an array of QCMAnswers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QCMAnswers
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}