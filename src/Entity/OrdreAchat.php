<?php

namespace App\Entity;

use App\Repository\OrdreAchatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdreAchatRepository::class)
 */
class OrdreAchat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $offreAcheteur;

    /**
     * @ORM\OneToOne(targetEntity=Date::class, cascade={"persist", "remove"})
     */
    private $idDate;

    /**
     * @ORM\ManyToOne(targetEntity=Vente::class, inversedBy="ordreAchats")
     */
    private $idVente;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="ordreAchats")
     */
    private $idAcheteur;

    public function __toString() {
        return $this->offreAcheteur;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffreAcheteur(): ?float
    {
        return $this->offreAcheteur;
    }

    public function setOffreAcheteur(float $offreAcheteur): self
    {
        $this->offreAcheteur = $offreAcheteur;

        return $this;
    }

    public function getIdDate(): ?date
    {
        return $this->idDate;
    }

    public function setIdDate(?date $idDate): self
    {
        $this->idDate = $idDate;

        return $this;
    }

    public function getIdVente(): ?vente
    {
        return $this->idVente;
    }

    public function setIdVente(?vente $idVente): self
    {
        $this->idVente = $idVente;

        return $this;
    }

    public function getIdAcheteur(): ?personne
    {
        return $this->idAcheteur;
    }

    public function setIdAcheteur(?personne $idAcheteur): self
    {
        $this->idAcheteur = $idAcheteur;

        return $this;
    }
}
