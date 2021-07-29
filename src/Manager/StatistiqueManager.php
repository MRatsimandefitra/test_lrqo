<?php
namespace App\Manager;

use App\Model\StatistiqueModel;
use Doctrine\Common\Collections\ArrayCollection;

class StatistiqueManager {

    private $stockManager;

    private $giftManager;

    private $receiverManager;

    /**
     * Constructor
     *
     * @param StockManager $stockManager
     * @param GiftManager $giftManager
     * @param ReceiverManager $receiverManager
     */
    public function __construct(StockManager $stockManager, GiftManager $giftManager, ReceiverManager $receiverManager)
    {
        $this->stockManager = $stockManager;
        $this->giftManager = $giftManager;
        $this->receiverManager = $receiverManager;
    }

    /**
     * Get statistique
     *
     * @return ArrayCollection
     */
    public function getStatistiques() {
        $stocks = $this->stockManager->getAll();
        $result = new ArrayCollection();
        foreach($stocks as $stock) {
            $statistique = $this->getStatistiqueByStock($stock->getId());
            $result->add($statistique);
        }

        return $result;

    }
    /**
     * GetStatistiqueByStock
     *
     * @param integer $idStock
     * @return StatistiqueModel
     */
    public function getStatistiqueByStock(int $idStock):StatistiqueModel{
        $statistique = new StatistiqueModel();
        $nombreCadeau = $this->giftManager->getGiftCountByStock($idStock);
        $nombrePaysDifferent = $this->receiverManager->getNombrePaysDifferentByStock($idStock);
        $prixMoyen = $this->giftManager->getPrixMoyenByStock($idStock);
        $plusPetitPrix = $this->giftManager->getPlusPetitPrixByStock($idStock);
        $plusGrandPrix = $this->giftManager->getPlusGrandPrixByStock($idStock);
        $statistique->setNombreCadeau($nombreCadeau);
        $statistique->setNombrePaysDifferent($nombrePaysDifferent);
        $statistique->setPrixMoyen($prixMoyen);
        $statistique->setPlusPetitPrix($plusPetitPrix);
        $statistique->setPlusGrandPrix($plusGrandPrix);

        return $statistique;
    }
}