<?php
namespace App\Model;

class StatistiqueModel {
    /**
     * Nombre de cadeau
     *
     * @var int $nombreCadeau
     */
    private $nombreCadeau;

    /**
     * Nombre de pays different
     *
     * @var int $nombrePaysDifferent
     */
    private $nombrePaysDifferent;

    /**
     * Prix moyen
     *
     * @var int $prixMoyen
     */
    private $prixMoyen;

    /**
     * Plus petit prix
     *
     * @var int $plusPetitPrix
     */
    private $plusPetitPrix;

    /**
     * Plus grand prix
     *
     * @var int $plusGrandPrix
     */
    private $plusGrandPrix;

    /**
     * Get $nombreCadeau
     *
     * @return  int
     */
    public function getNombreCadeau()
    {
        return $this->nombreCadeau;
    }

    /**
     * Set $nombreCadeau
     *
     * @param  int  $nombreCadeau  $nombreCadeau
     *
     * @return  self
     */
    public function setNombreCadeau(?int $nombreCadeau)
    {
        $this->nombreCadeau = $nombreCadeau;

        return $this;
    }

    /**
     * Get $nombrePaysDifferent
     *
     * @return  int
     */
    public function getNombrePaysDifferent()
    {
        return $this->nombrePaysDifferent;
    }

    /**
     * Set $nombrePaysDifferent
     *
     * @param  int  $nombrePaysDifferent  $nombrePaysDifferent
     *
     * @return  self
     */
    public function setNombrePaysDifferent(?int $nombrePaysDifferent)
    {
        $this->nombrePaysDifferent = $nombrePaysDifferent;

        return $this;
    }

    /**
     * Get $prixMoyen
     *
     * @return  int
     */
    public function getPrixMoyen()
    {
        return $this->prixMoyen;
    }

    /**
     * Set $prixMoyen
     *
     * @param  int  $prixMoyen  $prixMoyen
     *
     * @return  self
     */
    public function setPrixMoyen(?int $prixMoyen)
    {
        $this->prixMoyen = $prixMoyen;

        return $this;
    }

    /**
     * Get $plusPetitPrix
     *
     * @return  int
     */
    public function getPlusPetitPrix()
    {
        return $this->plusPetitPrix;
    }

    /**
     * Set $plusPetitPrix
     *
     * @param  int  $plusPetitPrix  $plusPetitPrix
     *
     * @return  self
     */
    public function setPlusPetitPrix(?int $plusPetitPrix)
    {
        $this->plusPetitPrix = $plusPetitPrix;

        return $this;
    }

    /**
     * Get $plusGrandPrix
     *
     * @return  int
     */
    public function getPlusGrandPrix()
    {
        return $this->plusGrandPrix;
    }

    /**
     * Set $plusGrandPrix
     *
     * @param  int  $plusGrandPrix  $plusGrandPrix
     *
     * @return  self
     */
    public function setPlusGrandPrix(?int $plusGrandPrix)
    {
        $this->plusGrandPrix = $plusGrandPrix;

        return $this;
    }
}