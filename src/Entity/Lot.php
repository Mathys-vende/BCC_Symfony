<?php

namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotRepository::class)
 */
class Lot
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $prixDeDepart;





    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixDeVente;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixDeReserve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity=Vente::class, mappedBy="idLot")
     */
    private $ventes;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, mappedBy="idlot")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Estimation::class, mappedBy="idLot")
     */
    private $estimations;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="idLot")
     */
    private $produits;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="lots")
     */
    private $idVendeur;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="idAcheteur")
     */
    private $idAcheteur;

    public function __toString() {
        return $this->nom;
    }

    public function __construct()
    {
        $this->ventes = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->estimations = new ArrayCollection();
        $this->produits = new ArrayCollection();
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

    public function getPrixDeDepart(): ?float
    {
        return $this->prixDeDepart;
    }

    public function setPrixDeDepart(float $prixDeDepart): self
    {
        $this->prixDeDepart = $prixDeDepart;

        return $this;
    }





    public function getPrixDeVente(): ?float
    {
        return $this->prixDeVente;
    }

    public function setPrixDeVente(?float $prixDeVente): self
    {
        $this->prixDeVente = $prixDeVente;

        return $this;
    }

    public function getPrixDeReserve(): ?float
    {
        return $this->prixDeReserve;
    }

    public function setPrixDeReserve(?float $prixDeReserve): self
    {
        $this->prixDeReserve = $prixDeReserve;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|Vente[]
     */
    public function getVentes(): Collection
    {
        return $this->ventes;
    }

    public function addVente(Vente $vente): self
    {
        if (!$this->ventes->contains($vente)) {
            $this->ventes[] = $vente;
            $vente->setIdLot($this);
        }

        return $this;
    }

    public function removeVente(Vente $vente): self
    {
        if ($this->ventes->removeElement($vente)) {
            // set the owning side to null (unless already changed)
            if ($vente->getIdLot() === $this) {
                $vente->setIdLot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addIdlot($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeIdlot($this);
        }

        return $this;
    }

    /**
     * @return Collection|Estimation[]
     */
    public function getEstimations(): Collection
    {
        return $this->estimations;
    }

    public function addEstimation(Estimation $estimation): self
    {
        if (!$this->estimations->contains($estimation)) {
            $this->estimations[] = $estimation;
            $estimation->setIdLot($this);
        }

        return $this;
    }

    public function removeEstimation(Estimation $estimation): self
    {
        if ($this->estimations->removeElement($estimation)) {
            // set the owning side to null (unless already changed)
            if ($estimation->getIdLot() === $this) {
                $estimation->setIdLot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setIdLot($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getIdLot() === $this) {
                $produit->setIdLot(null);
            }
        }

        return $this;
    }

    public function getIdVendeur(): ?Personne
    {
        return $this->idVendeur;
    }

    public function setIdVendeur(?Personne $idVendeur): self
    {
        $this->idVendeur = $idVendeur;

        return $this;
    }

    public function getIdAcheteur(): ?Personne
    {
        return $this->idAcheteur;
    }

    public function setIdAcheteur(?Personne $idAcheteur): self
    {
        $this->idAcheteur = $idAcheteur;

        return $this;
    }
}
