<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="produits")
     */
    private $idTag;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="idProduit")
     */
    private $photos;

    /**
     * @ORM\ManyToOne(targetEntity=Lot::class, inversedBy="produits")
     */
    private $idLot;

    public function __toString() {
        return $this->nom;
    }

    public function __construct()
    {
        $this->idTag = new ArrayCollection();
        $this->photos = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|tag[]
     */
    public function getIdTag(): Collection
    {
        return $this->idTag;
    }

    public function addIdTag(tag $idTag): self
    {
        if (!$this->idTag->contains($idTag)) {
            $this->idTag[] = $idTag;
        }

        return $this;
    }

    public function removeIdTag(tag $idTag): self
    {
        $this->idTag->removeElement($idTag);

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setIdProduit($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getIdProduit() === $this) {
                $photo->setIdProduit(null);
            }
        }

        return $this;
    }

    public function getIdLot(): ?lot
    {
        return $this->idLot;
    }

    public function setIdLot(?lot $idLot): self
    {
        $this->idLot = $idLot;

        return $this;
    }
}
