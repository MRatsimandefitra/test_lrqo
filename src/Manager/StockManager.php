<?php 

namespace App\Manager;

use App\Entity\Stock;
use App\Repository\StockRepository;
use DateTime;

class StockManager {

    private $repository;

    /**
     * Constructor
     *
     * @param StockRepository $repo
     */
    public function __construct(StockRepository $repo)
    {
        $this->repository = $repo;
    }

    /**
     * Get stock by filename
     *
     * @param string $filename
     * @return Stock
     */
    public function getStockByFilename(string $filename) {
        $stock = $this->repository->findOneBy(['fileName' => $filename]);
        if (!$stock) {
            $stock = new Stock();
            $stock
                ->setFileName($filename)
                ->setDateImport(new DateTime());
        }

        return $stock;
    }
    /**
     * Find all stock
     *
     * @return array
     */
    public function getAll() {

        return $this->repository->findAll();
    }
}