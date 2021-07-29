<?php

namespace App\Repository;

use App\Entity\Receiver;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Receiver|null find($id, $lockMode = null, $lockVersion = null)
 * @method Receiver|null findOneBy(array $criteria, array $orderBy = null)
 * @method Receiver[]    findAll()
 * @method Receiver[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReceiverRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Receiver::class);
    }
    /**
     * GetNombrePaysDifferentByStock
     *
     * @param int $idStock
     * @return array
     */
    public function getNombrePaysDifferentByStock($idStock) {
        return $this->createQueryBuilder('r')
            ->select('r.receiver_country_code')
            ->innerJoin('r.gifts', 'g')
            ->where('g.stock = :idStock')
            ->groupBy('r.receiver_country_code')
            ->setParameter('idStock', $idStock)
            ->getQuery()
            ->getResult()
        ;
    }
}
