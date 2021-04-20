<?php

namespace App\Entity;

use App\Repository\DeviseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeviseRepository::class)
 */
class Devise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $devise;

    /**
     * @ORM\OneToMany(targetEntity=VenteEnchere::class, mappedBy="idDevise")
     */
    private $venteEncheres;

    public function __toString() {
        return $this->devise;
    }

    public function __construct()
    {
        $this->venteEncheres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDevise(): ?string
    {
        return $this->devise;
    }

    public function setDevise(string $devise): self
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * @return Collection|VenteEnchere[]
     */
    public function getVenteEncheres(): Collection
    {
        return $this->venteEncheres;
    }

    public function addVenteEnchere(VenteEnchere $venteEnchere): self
    {
        if (!$this->venteEncheres->contains($venteEnchere)) {
            $this->venteEncheres[] = $venteEnchere;
            $venteEnchere->setIdDevise($this);
        }

        return $this;
    }

    public function removeVenteEnchere(VenteEnchere $venteEnchere): self
    {
        if ($this->venteEncheres->removeElement($venteEnchere)) {
            // set the owning side to null (unless already changed)
            if ($venteEnchere->getIdDevise() === $this) {
                $venteEnchere->setIdDevise(null);
            }
        }

        return $this;
    }
}
