<?php

namespace App\Repository;

use App\Entity\QCMQuestions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method QCMQuestions|null find($id, $lockMode = null, $lockVersion = null)
 * @method QCMQuestions|null findOneBy(array $criteria, array $orderBy = null)
 * @method QCMQuestions[]    findAll()
 * @method QCMQuestions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QCMQuestionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, QCMQuestions::class);
    }

    // /**
    //  * @return QCMQuestions[] Returns an array of QCMQuestions objects
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
    public function findOneBySomeField($value): ?QCMQuestions
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
