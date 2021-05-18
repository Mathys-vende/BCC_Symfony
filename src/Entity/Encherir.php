<?php

namespace App\Entity;

use App\Repository\EncherirRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EncherirRepository::class)
 */
class Encherir
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="encherirs")
     */
    private $idAcheteur;

    /**
     * @ORM\ManyToOne(targetEntity=Vente::class, inversedBy="encherirs")
     */
    private $idVente;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $prixPropose;

    public function __toString() {
        return (string)$this->prixPropose;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdVente(): ?vente
    {
        return $this->idVente;
    }

    public function setIdVente(?vente $idVente): self
    {
        $this->idVente = $idVente;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPrixPropose(): ?float
    {
        return $this->prixPropose;
    }

    public function setPrixPropose(float $prixPropose): self
    {
        $this->prixPropose = $prixPropose;

        return $this;
    }
}
