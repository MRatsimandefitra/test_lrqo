<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotNull
     */
    private $fileName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateImport;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Gift", mappedBy="stock")
     */
    private $gifts;

    public function __construct()
    {
        $this->gifts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getDateImport(): ?\DateTimeInterface
    {
        return $this->dateImport;
    }

    public function setDateImport(\DateTimeInterface $dateImport): self
    {
        $this->dateImport = $dateImport;

        return $this;
    }

    /**
     * Get the value of gifts
     */ 
    public function getGifts()
    {
        return $this->gifts;
    }

    /**
     * Set the value of gifts
     *
     * @return  self
     */ 
    public function addGift($gift)
    {
        $this->gifts->add($gift);

        return $this;
    }
    /**
     * Remove gift
     *
     * @return  self
     */ 
    public function removeGift($gift)
    {
        $this->gifts->remove($gift);

        return $this;
    }
}
