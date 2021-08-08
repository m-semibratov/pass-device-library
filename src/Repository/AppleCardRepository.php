<?php

namespace App\Repository;

use App\Entity\AppleCard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AppleCard|null find($id, $lockMode = null, $lockVersion = null)
 * @method AppleCard|null findOneBy(array $criteria, array $orderBy = null)
 * @method AppleCard[]    findAll()
 * @method AppleCard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppleCardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppleCard::class);
    }
}
