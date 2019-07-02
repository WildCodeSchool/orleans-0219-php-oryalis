<?php

namespace App\Repository;

use App\Entity\Standard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Standard|null find($id, $lockMode = null, $lockVersion = null)
 * @method Standard|null findOneBy(array $criteria, array $orderBy = null)
 * @method Standard[]    findAll()
 * @method Standard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StandardRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Standard::class);
    }
}