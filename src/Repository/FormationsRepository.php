<?php

namespace App\Repository;

use App\Entity\Formations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Formations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formations[]    findAll()
 * @method Formations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Formations::class);
    }
}
