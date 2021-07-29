<?php

namespace App\Entity;

use App\Repository\GiftRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=GiftRepository::class)
 */
class Gift
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
    private $gift_uuid;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     */
    private $gift_code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $gift_description;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     * @Assert\NotNull
     * @Assert\Positive
     */
    private $gift_price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stock", inversedBy="gifts", cascade={"persist"})
     */
    private $stock;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Receiver", inversedBy="gifts", cascade={"persist"})
     */
    private $receiver;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGiftUuid(): ?string
    {
        return $this->gift_uuid;
    }

    public function setGiftUuid(string $gift_uuid): self
    {
        $this->gift_uuid = $gift_uuid;

        return $this;
    }

    public function getGiftCode(): ?string
    {
        return $this->gift_code;
    }

    public function setGiftCode(string $gift_code): self
    {
        $this->gift_code = $gift_code;

        return $this;
    }

    public function getGiftDescription(): ?string
    {
        return $this->gift_description;
    }

    public function setGiftDescription(string $gift_description): self
    {
        $this->gift_description = $gift_description;

        return $this;
    }

    public function getGiftPrice(): ?string
    {
        return $this->gift_price;
    }

    public function setGiftPrice(string $gift_price): self
    {
        $this->gift_price = $gift_price;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of receiver
     */ 
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set the value of receiver
     *
     * @return  self
     */ 
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }
}
