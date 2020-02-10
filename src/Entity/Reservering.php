<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReserveringRepository")
 */
class Reservering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Klant", inversedBy="reserverings")
     */
    private $klant;

    /**
     * @ORM\Column(type="integer")
     */
    private $tafel_nummer;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="time")
     */
    private $tijd;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bestelling", mappedBy="reservering")
     */
    private $bestellings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bestelling", mappedBy="tafel")
     */
    private $tafel;

    public function __construct()
    {
        $this->bestellings = new ArrayCollection();
        $this->tafel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKlant(): ?Klant
    {
        return $this->klant;
    }

    public function setKlant(?Klant $klant): self
    {
        $this->klant = $klant;

        return $this;
    }

    public function getTafelNummer(): ?int
    {
        return $this->tafel_nummer;
    }

    public function setTafelNummer(int $tafel_nummer): self
    {
        $this->tafel_nummer = $tafel_nummer;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getTijd(): ?\DateTimeInterface
    {
        return $this->tijd;
    }

    public function setTijd(\DateTimeInterface $tijd): self
    {
        $this->tijd = $tijd;

        return $this;
    }

    /**
     * @return Collection|Bestelling[]
     */
    public function getBestellings(): Collection
    {
        return $this->bestellings;
    }

    public function addBestelling(Bestelling $bestelling): self
    {
        if (!$this->bestellings->contains($bestelling)) {
            $this->bestellings[] = $bestelling;
            $bestelling->setReservering($this);
        }

        return $this;
    }

    public function removeBestelling(Bestelling $bestelling): self
    {
        if ($this->bestellings->contains($bestelling)) {
            $this->bestellings->removeElement($bestelling);
            // set the owning side to null (unless already changed)
            if ($bestelling->getReservering() === $this) {
                $bestelling->setReservering(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return (string) $this->getId();
    }

    /**
     * @return Collection|Bestelling[]
     */
    public function getTafel(): Collection
    {
        return $this->tafel;
    }

    public function addTafel(Bestelling $tafel): self
    {
        if (!$this->tafel->contains($tafel)) {
            $this->tafel[] = $tafel;
            $tafel->setTafel($this);
        }

        return $this;
    }

    public function removeTafel(Bestelling $tafel): self
    {
        if ($this->tafel->contains($tafel)) {
            $this->tafel->removeElement($tafel);
            // set the owning side to null (unless already changed)
            if ($tafel->getTafel() === $this) {
                $tafel->setTafel(null);
            }
        }

        return $this;
    }
}
