<?php

namespace App\Entity;

use App\Repository\CommissairePriseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommissairePriseurRepository::class)
 */
class CommissairePriseur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist", "remove"})
     */
    private $idPersonne;

    /**
     * @ORM\OneToMany(targetEntity=SalleDeVente::class, mappedBy="idCommissairePriseur")
     */
    private $salleDeVentes;

    /**
     * @ORM\OneToMany(targetEntity=Estimation::class, mappedBy="idCommissaire")
     */
    private $estimations;

    public function __toString() {
        return (string)$this->idPersonne;
    }

    public function __construct()
    {
        $this->salleDeVentes = new ArrayCollection();
        $this->estimations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPersonne(): ?personne
    {
        return $this->idPersonne;
    }

    public function setIdPersonne(?personne $idPersonne): self
    {
        $this->idPersonne = $idPersonne;

        return $this;
    }

    /**
     * @return Collection|SalleDeVente[]
     */
    public function getSalleDeVentes(): Collection
    {
        return $this->salleDeVentes;
    }

    public function addSalleDeVente(SalleDeVente $salleDeVente): self
    {
        if (!$this->salleDeVentes->contains($salleDeVente)) {
            $this->salleDeVentes[] = $salleDeVente;
            $salleDeVente->setIdCommissairePriseur($this);
        }

        return $this;
    }

    public function removeSalleDeVente(SalleDeVente $salleDeVente): self
    {
        if ($this->salleDeVentes->removeElement($salleDeVente)) {
            // set the owning side to null (unless already changed)
            if ($salleDeVente->getIdCommissairePriseur() === $this) {
                $salleDeVente->setIdCommissairePriseur(null);
            }
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
            $estimation->setIdCommissaire($this);
        }

        return $this;
    }

    public function removeEstimation(Estimation $estimation): self
    {
        if ($this->estimations->removeElement($estimation)) {
            // set the owning side to null (unless already changed)
            if ($estimation->getIdCommissaire() === $this) {
                $estimation->setIdCommissaire(null);
            }
        }

        return $this;
    }
}
