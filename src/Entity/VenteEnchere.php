<?php

namespace App\Entity;

use App\Repository\VenteEnchereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VenteEnchereRepository::class)
 */
class VenteEnchere
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
     * @ORM\ManyToOne(targetEntity=SalleDeVente::class, inversedBy="venteEncheres")
     */
    private $idSalleDeVente;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Devise::class, inversedBy="venteEncheres")
     */
    private $idDevise;

    /**
     * @ORM\OneToMany(targetEntity=Vente::class, mappedBy="idVenteEnchere")
     */
    private $vente;

    public function __toString() {
        return $this->nom;
    }

    public function __construct()
    {
        $this->vente = new ArrayCollection();
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

    public function getIdSalleDeVente(): ?SalleDeVente
    {
        return $this->idSalleDeVente;
    }

    public function setIdSalleDeVente(?SalleDeVente $idSalleDeVente): self
    {
        $this->idSalleDeVente = $idSalleDeVente;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getIdDevise(): ?devise
    {
        return $this->idDevise;
    }

    public function setIdDevise(?devise $idDevise): self
    {
        $this->idDevise = $idDevise;

        return $this;
    }

    /**
     * @return Collection|Vente[]
     */
    public function getVente(): Collection
    {
        return $this->vente;
    }

    public function addVente(Vente $vente): self
    {
        if (!$this->vente->contains($vente)) {
            $this->vente[] = $vente;
            $vente->setIdVenteEnchere($this);
        }

        return $this;
    }

    public function removeVente(Vente $vente): self
    {
        if ($this->vente->removeElement($vente)) {
            // set the owning side to null (unless already changed)
            if ($vente->getIdVenteEnchere() === $this) {
                $vente->setIdVenteEnchere(null);
            }
        }

        return $this;
    }
}
