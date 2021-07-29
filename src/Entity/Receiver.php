<?php

namespace App\Entity;

use App\Repository\ReceiverRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ReceiverRepository::class)
 */
class Receiver
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
    private $receiver_uuid;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     */
    private $receiver_first_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     */
    private $receiver_last_name;

    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotNull
     */
    private $receiver_country_code;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Gift", mappedBy="receiver")
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

    public function getReceiverUuid(): ?string
    {
        return $this->receiver_uuid;
    }

    public function setReceiverUuid(string $receiver_uuid): self
    {
        $this->receiver_uuid = $receiver_uuid;

        return $this;
    }

    public function getReceiverFirstName(): ?string
    {
        return $this->receiver_first_name;
    }

    public function setReceiverFirstName(string $receiver_first_name): self
    {
        $this->receiver_first_name = $receiver_first_name;

        return $this;
    }

    public function getReceiverLastName(): ?string
    {
        return $this->receiver_last_name;
    }

    public function setReceiverLastName(string $receiver_last_name): self
    {
        $this->receiver_last_name = $receiver_last_name;

        return $this;
    }

    public function getReceiverCountryCode(): ?string
    {
        return $this->receiver_country_code;
    }

    public function setReceiverCountryCode(string $receiver_country_code): self
    {
        $this->receiver_country_code = $receiver_country_code;

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
