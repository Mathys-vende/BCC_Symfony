<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 */
class Personne implements UserInterface
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $civilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Adresse::class, mappedBy="personne")
     */
    private $idAdresse;

    /**
     * @ORM\OneToMany(targetEntity=OrdreAchat::class, mappedBy="idAcheteur")
     */
    private $ordreAchats;

    /**
     * @ORM\OneToMany(targetEntity=Encherir::class, mappedBy="idAcheteur")
     */
    private $encherirs;

    public function __toString(): ?string
    {
        return $this->email;
    }

    public function __construct()
    {
        $this->idAdresse = new ArrayCollection();
        $this->ordreAchats = new ArrayCollection();
        $this->encherirs = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|adresse[]
     */
    public function getIdAdresse(): Collection
    {
        return $this->idAdresse;
    }

    public function addIdAdresse(adresse $idAdresse): self
    {
        if (!$this->idAdresse->contains($idAdresse)) {
            $this->idAdresse[] = $idAdresse;
            $idAdresse->setPersonne($this);
        }

        return $this;
    }

    public function removeIdAdresse(adresse $idAdresse): self
    {
        if ($this->idAdresse->removeElement($idAdresse)) {
            // set the owning side to null (unless already changed)
            if ($idAdresse->getPersonne() === $this) {
                $idAdresse->setPersonne(null);
            }
        }

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
            $ordreAchat->setIdAcheteur($this);
        }

        return $this;
    }

    public function removeOrdreAchat(OrdreAchat $ordreAchat): self
    {
        if ($this->ordreAchats->removeElement($ordreAchat)) {
            // set the owning side to null (unless already changed)
            if ($ordreAchat->getIdAcheteur() === $this) {
                $ordreAchat->setIdAcheteur(null);
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
            $encherir->setIdAcheteur($this);
        }

        return $this;
    }

    public function removeEncherir(Encherir $encherir): self
    {
        if ($this->encherirs->removeElement($encherir)) {
            // set the owning side to null (unless already changed)
            if ($encherir->getIdAcheteur() === $this) {
                $encherir->setIdAcheteur(null);
            }
        }

        return $this;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        return $this->getNom();
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
