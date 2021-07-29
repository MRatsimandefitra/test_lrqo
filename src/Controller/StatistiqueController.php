<?php

namespace App\Controller;

use App\Manager\StatistiqueManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatistiqueController extends AbstractController
{
    /**
     * @Route("/api/statistique", name="statistique")
     */
    public function statistique(StatistiqueManager $statistiqueManager): Response
    {
        $result = $statistiqueManager->getStatistiques();

        return $this->json($result);
    }
    /**
     * @Route("/api/statistique/{id_stock}", name="statistique_by_stock")
     */
    public function statistiqueByStock(int $id_stock, StatistiqueManager $statistiqueManager): Response
    {
        $result = $statistiqueManager->getStatistiqueByStock($id_stock);

        return $this->json($result);
    }
}
