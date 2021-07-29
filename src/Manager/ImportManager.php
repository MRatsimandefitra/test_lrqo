<?php 

namespace App\Manager;

use App\Entity\Gift;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ImportManager {

    private $validator;

    private $em;

    private $params;

    private $giftManager;

    private $receiverManager;

    private $stockManager;

    /**
     * Constructor
     *
     * @param ParameterBagInterface $params
     * @param ValidatorInterface $validator
     * @param EntityManagerInterface $em
     * @param GiftManager $giftManager
     * @param Receiver $receiverManager
     * @param StockManager $stockManager
     */
    public function __construct(ParameterBagInterface $params, ValidatorInterface $validator, EntityManagerInterface $em, GiftManager $giftManager, ReceiverManager $receiverManager, StockManager $stockManager)
    {
        $this->validator = $validator;
        $this->em = $em;
        $this->params = $params;
        $this->giftManager = $giftManager;
        $this->receiverManager = $receiverManager;
        $this->stockManager = $stockManager;
    }

    /**
     * Step inport rows
     *
     * @param array $rows
     * @param int $startIndex
     * @param int $length
     * @return array
     */
    public function stepImport(string $filename, int $startIndex, int $length = 20) {
        $em = $this->em;
        if (!$this->em->isOpen()) {
            $em = $this->em->create(
                $this->em->getConnection(), $this->em->getConfiguration());
        }
        $rows = $this->getCsvToArray($filename, $startIndex, $length);
        $stock = $this->stockManager->getStockByFilename($filename);
        try {
            $index = $startIndex;
            foreach($rows as $row) {
                $gift = $this->giftManager->getGiftByCsvRow($row);
                $receiver =  $this->receiverManager->getReceiverByCsvRow($row);
                $gift->setReceiver($receiver);
                $gift->setStock($stock);
                $errorsGift = $this->validator->validate($gift);
                $errorsReceiver = $this->validator->validate($receiver);
                if(count($errorsGift) == 0 && count($errorsReceiver) == 0) {
                    $em->persist($gift);
                }
                $index++;
            }
            $em->flush();
            $em->clear();
        } catch(\Exception $e) {
            throw ($e);
        }

        return $rows;
    }

    /**
     * Csv to array
     *
     * @param string $filename
     * @return array
     */
    public function getCsvToArray(string $filename, $startIndex = 0, $length = -1) : array{
        $file = $this->params->get('upload_directory').'/'.$filename;
        $decoder = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);
        $rows = $decoder->decode(file_get_contents($file), 'csv');
        if ($length == -1) {
            return array_slice($rows, $startIndex);
        }
        return array_slice($rows, $startIndex, $length);
    }
}