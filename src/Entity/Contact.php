<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groupe;

    /**
     * @ORM\ManyToOne(targetEntity=GroupeContact::class, inversedBy="idContact")
     */
    private $idGroupe;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="idContact")
     */
    private $idUser;

    /**
     * @ORM\OneToMany(targetEntity=DestinataireCamp::class, mappedBy="idContact")
     */
    private $idCamp;

    public function __construct()
    {
        $this->idCamp = new ArrayCollection();
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(?string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getIdGroupe(): ?GroupeContact
    {
        return $this->idGroupe;
    }

    public function setIdGroupe(?GroupeContact $idGroupe): self
    {
        $this->idGroupe = $idGroupe;

        return $this;
    }

    public function getIdUser(): ?Client
    {
        return $this->idUser;
    }

    public function setIdUser(?Client $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * @return Collection|DestinataireCamp[]
     */
    public function getIdCamp(): Collection
    {
        return $this->idCamp;
    }

    public function addIdCamp(DestinataireCamp $idCamp): self
    {
        if (!$this->idCamp->contains($idCamp)) {
            $this->idCamp[] = $idCamp;
            $idCamp->setIdContact($this);
        }

        return $this;
    }

    public function removeIdCamp(DestinataireCamp $idCamp): self
    {
        if ($this->idCamp->removeElement($idCamp)) {
            // set the owning side to null (unless already changed)
            if ($idCamp->getIdContact() === $this) {
                $idCamp->setIdContact(null);
            }
        }

        return $this;
    }
}
