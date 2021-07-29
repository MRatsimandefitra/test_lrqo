<?php 

namespace App\Manager;

use App\Entity\Gift;
use App\Entity\Receiver;
use App\Repository\ReceiverRepository;

class ReceiverManager {

    private $repository;

    /**
     * Constructor
     *
     * @param ReceiverRepository $repo
     */
    public function __construct(ReceiverRepository $repo)
    {
        $this->repository = $repo;
    }

    /**
     * GetNombrePaysDifferentByStock
     *
     * @param int $idStock
     * @return int
     */
    public function getNombrePaysDifferentByStock($idStock) {
        return count($this->repository->getNombrePaysDifferentByStock($idStock));

    }
    /**
     * GetReceiver by csv row
     *
     * @param array $row
     * @return Receiver
     */
    public function getReceiverByCsvRow($row) {

        $uuid = isset($row['receiver_uuid'])?$row['receiver_uuid']:'';
        $uuid = isset($row['receiver_uuid'])?$row['receiver_uuid']:'';
        $firstname = isset($row['receiver_first_name'])?$row['receiver_first_name']:'';
        $lastname = isset($row['receiver_last_name'])?$row['receiver_last_name']:'';
        $countryCode = isset($row['receiver_country_code'])?$row['receiver_country_code']:'';
        $receiver = new Receiver();
        $receiver
            ->setReceiverUuid($uuid)
            ->setReceiverFirstName($firstname)
            ->setReceiverLastName($lastname)
            ->setReceiverCountryCode($countryCode);

        return $receiver;
    }

}