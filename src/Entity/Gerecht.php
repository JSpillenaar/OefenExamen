<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GerechtRepository")
 */
class Gerecht
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
    private $soort;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Subgerecht", mappedBy="gerechtsoort")
     */
    private $subgerechts;

    public function __construct()
    {
        $this->subgerechts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoort(): ?string
    {
        return $this->soort;
    }

    public function setSoort(string $soort): self
    {
        $this->soort = $soort;

        return $this;
    }

    /**
     * @return Collection|Subgerecht[]
     */
    public function getSubgerechts(): Collection
    {
        return $this->subgerechts;
    }

    public function addSubgerecht(Subgerecht $subgerecht): self
    {
        if (!$this->subgerechts->contains($subgerecht)) {
            $this->subgerechts[] = $subgerecht;
            $subgerecht->setGerechtsoort($this);
        }

        return $this;
    }

    public function removeSubgerecht(Subgerecht $subgerecht): self
    {
        if ($this->subgerechts->contains($subgerecht)) {
            $this->subgerechts->removeElement($subgerecht);
            // set the owning side to null (unless already changed)
            if ($subgerecht->getGerechtsoort() === $this) {
                $subgerecht->setGerechtsoort(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return (string) $this->getSoort();
    }
}
