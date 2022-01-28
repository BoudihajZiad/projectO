<?php

namespace App\Entity;

use App\Repository\GroupeContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupeContactRepository::class)
 */
class GroupeContact
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
     * @ORM\OneToMany(targetEntity=Contact::class, mappedBy="idGroupe")
     */
    private $idContact;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="idGroupe")
     */
    private $idUser;

    public function __construct()
    {
        $this->groupeCont = new ArrayCollection();
        $this->idContact = new ArrayCollection();
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

    /**
     * @return Collection|Contact[]
     */
    public function getIdContact(): Collection
    {
        return $this->idContact;
    }

    public function addIdContact(Contact $idContact): self
    {
        if (!$this->idContact->contains($idContact)) {
            $this->idContact[] = $idContact;
            $idContact->setIdGroupe($this);
        }

        return $this;
    }

    public function removeIdContact(Contact $idContact): self
    {
        if ($this->idContact->removeElement($idContact)) {
            // set the owning side to null (unless already changed)
            if ($idContact->getIdGroupe() === $this) {
                $idContact->setIdGroupe(null);
            }
        }

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
}
