<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KlantRepository")
 */
class Klant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefoon_nummer;

    /**
     * @ORM\Column(type="text")
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservering", mappedBy="klant")
     */
    private $reserverings;

    public function __construct()
    {
        $this->reserverings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getTelefoonNummer(): ?int
    {
        return $this->telefoon_nummer;
    }

    public function setTelefoonNummer(int $telefoon_nummer): self
    {
        $this->telefoon_nummer = $telefoon_nummer;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Reservering[]
     */
    public function getReserverings(): Collection
    {
        return $this->reserverings;
    }

    public function addReservering(Reservering $reservering): self
    {
        if (!$this->reserverings->contains($reservering)) {
            $this->reserverings[] = $reservering;
            $reservering->setKlant($this);
        }

        return $this;
    }

    public function removeReservering(Reservering $reservering): self
    {
        if ($this->reserverings->contains($reservering)) {
            $this->reserverings->removeElement($reservering);
            // set the owning side to null (unless already changed)
            if ($reservering->getKlant() === $this) {
                $reservering->setKlant(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return (string) $this->getNaam();
    }
}
