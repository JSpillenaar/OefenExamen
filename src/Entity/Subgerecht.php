<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubgerechtRepository")
 */
class Subgerecht
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Gerecht", inversedBy="subgerechts")
     */
    private $gerechtsoort;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MenuItem", mappedBy="subgerechtsoort")
     */
    private $menuItems;

    public function __construct()
    {
        $this->menuItems = new ArrayCollection();
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

    public function getGerechtsoort(): ?Gerecht
    {
        return $this->gerechtsoort;
    }

    public function setGerechtsoort(?Gerecht $gerechtsoort): self
    {
        $this->gerechtsoort = $gerechtsoort;

        return $this;
    }

    /**
     * @return Collection|MenuItem[]
     */
    public function getMenuItems(): Collection
    {
        return $this->menuItems;
    }

    public function addMenuItem(MenuItem $menuItem): self
    {
        if (!$this->menuItems->contains($menuItem)) {
            $this->menuItems[] = $menuItem;
            $menuItem->setSubgerechtsoort($this);
        }

        return $this;
    }

    public function removeMenuItem(MenuItem $menuItem): self
    {
        if ($this->menuItems->contains($menuItem)) {
            $this->menuItems->removeElement($menuItem);
            // set the owning side to null (unless already changed)
            if ($menuItem->getSubgerechtsoort() === $this) {
                $menuItem->setSubgerechtsoort(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return (string) $this->getSoort();
    }
}
