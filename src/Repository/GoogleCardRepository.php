<?php

namespace App\Repository;

use App\Entity\GoogleCard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GoogleCard|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoogleCard|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoogleCard[]    findAll()
 * @method GoogleCard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoogleCardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GoogleCard::class);
    }
}
