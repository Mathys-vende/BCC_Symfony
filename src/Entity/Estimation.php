<?php

namespace App\Entity;

use App\Repository\EstimationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstimationRepository::class)
 */
class Estimation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $valeur;

    /**
     * @ORM\OneToOne(targetEntity=Date::class, cascade={"persist", "remove"})
     */
    private $idDate;

    /**
     * @ORM\ManyToOne(targetEntity=Lot::class, inversedBy="estimations")
     */
    private $idLot;

    /**
     * @ORM\ManyToOne(targetEntity=CommissairePriseur::class, inversedBy="estimations")
     */
    private $idCommissaire;

    public function __toString() {
        return $this->description;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getValeur(): ?float
    {
        return $this->valeur;
    }

    public function setValeur(float $valeur): self
    {
        $this->valeur = $valeur;

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

    public function getIdLot(): ?lot
    {
        return $this->idLot;
    }

    public function setIdLot(?lot $idLot): self
    {
        $this->idLot = $idLot;

        return $this;
    }

    public function getIdCommissaire(): ?commissairePriseur
    {
        return $this->idCommissaire;
    }

    public function setIdCommissaire(?commissairePriseur $idCommissaire): self
    {
        $this->idCommissaire = $idCommissaire;

        return $this;
    }
}
