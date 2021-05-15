<?php

namespace App\Entity;

use App\Repository\VenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VenteRepository::class)
 */
class Vente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=VenteEnchere::class, inversedBy="commission")
     */
    private $idVenteEnchere;

    /**
     * @ORM\Column(type="float")
     */
    private $commission;

    /**
     * @ORM\ManyToOne(targetEntity=Lot::class, inversedBy="ventes")
     */
    private $idLot;

    /**
     * @ORM\OneToMany(targetEntity=OrdreAchat::class, mappedBy="idVente")
     */
    private $ordreAchats;

    /**
     * @ORM\OneToMany(targetEntity=Encherir::class, mappedBy="idVente")
     */
    private $encherirs;

    public function __toString() {
        return $this->ordreAchats;
    }

    public function __construct()
    {
        $this->ordreAchats = new ArrayCollection();
        $this->encherirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdVenteEnchere(): ?venteEnchere
    {
        return $this->idVenteEnchere;
    }

    public function setIdVenteEnchere(?venteEnchere $idVenteEnchere): self
    {
        $this->idVenteEnchere = $idVenteEnchere;

        return $this;
    }

    public function getCommission(): ?float
    {
        return $this->commission;
    }

    public function setCommission(float $commission): self
    {
        $this->commission = $commission;

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

    /**
     * @return Collection|OrdreAchat[]
     */
    public function getOrdreAchats(): Collection
    {
        return $this->ordreAchats;
    }

    public function addOrdreAchat(OrdreAchat $ordreAchat): self
    {
        if (!$this->ordreAchats->contains($ordreAchat)) {
            $this->ordreAchats[] = $ordreAchat;
            $ordreAchat->setIdVente($this);
        }

        return $this;
    }

    public function removeOrdreAchat(OrdreAchat $ordreAchat): self
    {
        if ($this->ordreAchats->removeElement($ordreAchat)) {
            // set the owning side to null (unless already changed)
            if ($ordreAchat->getIdVente() === $this) {
                $ordreAchat->setIdVente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Encherir[]
     */
    public function getEncherirs(): Collection
    {
        return $this->encherirs;
    }

    public function addEncherir(Encherir $encherir): self
    {
        if (!$this->encherirs->contains($encherir)) {
            $this->encherirs[] = $encherir;
            $encherir->setIdVente($this);
        }

        return $this;
    }

    public function removeEncherir(Encherir $encherir): self
    {
        if ($this->encherirs->removeElement($encherir)) {
            // set the owning side to null (unless already changed)
            if ($encherir->getIdVente() === $this) {
                $encherir->setIdVente(null);
            }
        }

        return $this;
    }
}
