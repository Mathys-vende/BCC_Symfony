<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="idlot")
     */
    private $idCategorie;

    /**
     * @ORM\ManyToMany(targetEntity=Lot::class, inversedBy="categories")
     */
    private $idlot;

    public function __toString() {
        return $this->nom;
    }

    public function __construct()
    {
        $this->idlot = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdCategorie(): ?categorie
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?categorie $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    /**
     * @return Collection|lot[]
     */
    public function getIdlot(): Collection
    {
        return $this->idlot;
    }

    public function addIdlot(lot $idlot): self
    {
        if (!$this->idlot->contains($idlot)) {
            $this->idlot[] = $idlot;
        }

        return $this;
    }

    public function removeIdlot(lot $idlot): self
    {
        $this->idlot->removeElement($idlot);

        return $this;
    }
}
