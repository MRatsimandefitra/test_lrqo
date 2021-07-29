<?php 

namespace App\Manager;

use App\Entity\Gift;
use App\Repository\GiftRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class GiftManager {

    private $repository;

    /**
     * Constructor
     *
     * @param GiftRepository $repository
     */
    public function __construct(GiftRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get giftCountBystock
     *
     * @param integer $idStock
     * @return int
     */
    public function getGiftCountByStock(int $idStock) {
        return count($this->repository->findGiftByStock($idStock));
    }

    /**
     * GetPrixMoyenByStock
     *
     * @param integer $idStock
     * @return int
     */
    public function getPrixMoyenByStock(int $idStock) {
        return $this->repository->getPrixMoyenByStock($idStock);
    }

    /**
     * GetPlusPetitPrixByStock
     *
     * @param integer $idStock
     * @return int
     */
    public function getPlusPetitPrixByStock(int $idStock) {
        return $this->repository->getPlusPetitPrixByStock($idStock);
    }

    /**
     * GetPlusGrandPrixByStock
     *
     * @param integer $idStock
     * @return int
     */
    public function getPlusGrandPrixByStock(int $idStock) {
        return $this->repository->getPlusGrandPrixByStock($idStock);
    }

    /**
     * GetGift by csv row
     *
     * @param array $row
     * @return Receiver
     */
    public function getGiftByCsvRow($row) {

        $uuicode = isset($row['gift_uuid'])?$row['gift_uuid']:'';
        $gift = new Gift();
        $code = isset($row['gift_code'])?$row['gift_code']:'';
        $price = isset($row['gift_price'])?$row['gift_price']:'';
        $description = isset($row['gift_description'])?$row['gift_description']:'';
        $gift
            ->setGiftUuid($uuicode)
            ->setGiftCode($code)
            ->setGiftDescription($description)
            ->setGiftPrice($price);

        return $gift;
    }
}