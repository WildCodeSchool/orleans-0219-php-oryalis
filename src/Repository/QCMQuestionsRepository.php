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

    public function findOneById()
    {
        $queryBuilder = $this->createQueryBuilder('q')
            ->select('MAX(q.id)')
            ->orderBy('q.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;

        $result = $queryBuilder->getResult();

            return $result;
    }
}
