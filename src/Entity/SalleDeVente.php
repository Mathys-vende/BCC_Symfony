<?php

namespace App\Entity;

use App\Repository\SalleDeVenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalleDeVenteRepository::class)
 */
class SalleDeVente
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
     * @ORM\OneToOne(targetEntity=Adresse::class, cascade={"persist", "remove"})
     */
    private $idAdresse;

    /**
     * @ORM\ManyToOne(targetEntity=CommissairePriseur::class, inversedBy="salleDeVentes")
     */
    private $idCommissairePriseur;

    /**
     * @ORM\OneToMany(targetEntity=VenteEnchere::class, mappedBy="idSalleDeVente")
     */
    private $venteEncheres;

    public function __toString() {
        return $this->nom;
    }

    public function __construct()
    {
        $this->venteEncheres = new ArrayCollection();
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

    public function getIdAdresse(): ?adresse
    {
        return $this->idAdresse;
    }

    public function setIdAdresse(?adresse $idAdresse): self
    {
        $this->idAdresse = $idAdresse;

        return $this;
    }

    public function getIdCommissairePriseur(): ?commissairePriseur
    {
        return $this->idCommissairePriseur;
    }

    public function setIdCommissairePriseur(?commissairePriseur $idCommissairePriseur): self
    {
        $this->idCommissairePriseur = $idCommissairePriseur;

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
            $venteEnchere->setIdSalleDeVente($this);
        }

        return $this;
    }

    public function removeVenteEnchere(VenteEnchere $venteEnchere): self
    {
        if ($this->venteEncheres->removeElement($venteEnchere)) {
            // set the owning side to null (unless already changed)
            if ($venteEnchere->getIdSalleDeVente() === $this) {
                $venteEnchere->setIdSalleDeVente(null);
            }
        }

        return $this;
    }
}
