<?php

namespace App\Repository;

use App\Entity\Gift;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gift|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gift|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gift[]    findAll()
 * @method Gift[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GiftRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gift::class);
    }

    /**
     * Find all gift by stock
     *
     * @param integer $idStock
     * @return array
     */
    public function findGiftByStock(int $idStock): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.stock = :idStock')
            ->setParameter('idStock', $idStock)
            ->getQuery()
            ->getArrayResult()
        ;
    }

    /**
     * GetPrixMoyenByStock
     *
     * @param integer $idStock
     * @return int
     */
    public function getPrixMoyenByStock(int $idStock) {
        return $this->createQueryBuilder('g')
            ->select('avg(g.gift_price)')
            ->andWhere('g.stock = :idStock')
            ->setParameter('idStock', $idStock)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    /**
     * GetPlusPetitPrixByStock
     *
     * @param integer $idStock
     * @return int
     */
    public function getPlusPetitPrixByStock(int $idStock) {
        return $this->createQueryBuilder('g')
            ->select('min(g.gift_price)')
            ->andWhere('g.stock = :idStock')
            ->setParameter('idStock', $idStock)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    /**
     * GetPlusGrandPrixByStock
     *
     * @param integer $idStock
     * @return int
     */
    public function getPlusGrandPrixByStock(int $idStock) {
        return $this->createQueryBuilder('g')
            ->select('max(g.gift_price)')
            ->andWhere('g.stock = :idStock')
            ->setParameter('idStock', $idStock)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

}
