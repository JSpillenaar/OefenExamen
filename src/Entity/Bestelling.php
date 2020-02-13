<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BestellingRepository")
 */
class Bestelling
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MenuItem", inversedBy="bestellings")
     */
    private $menuitem;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservering", inversedBy="bestellings")
     */
    private $reservering;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bon", inversedBy="bestellings")
     */
    private $bon;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservering", inversedBy="tafel")
     */
    private $tafel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Gereed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenuitem(): ?MenuItem
    {
        return $this->menuitem;
    }

    public function setMenuitem(?MenuItem $menuitem): self
    {
        $this->menuitem = $menuitem;

        return $this;
    }

    public function getReservering(): ?Reservering
    {
        return $this->reservering;
    }

    public function setReservering(?Reservering $reservering): self
    {
        $this->reservering = $reservering;

        return $this;
    }

    public function getBon(): ?Bon
    {
        return $this->bon;
    }

    public function setBon(?Bon $bon): self
    {
        $this->bon = $bon;

        return $this;
    }

    public function getTafel(): ?Reservering
    {
        return $this->tafel;
    }

    public function setTafel(?Reservering $tafel): self
    {
        $this->tafel = $tafel;

        return $this;
    }

    public function getGereed(): ?bool
    {
        return $this->Gereed;
    }

    public function setGereed(bool $Gereed): self
    {
        $this->Gereed = $Gereed;

        return $this;
    }
}
