<?php

namespace App\Entity;

use App\Repository\MessageSimpleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageSimpleRepository::class)
 */
class MessageSimple
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $langue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Campagne::class, mappedBy="idMessageSimple")
     */
    private $idCampagne;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="idMessageSimple")
     */
    private $idUser;

    public function __construct()
    {
        $this->idCampagne = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(?string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

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
     * @return Collection|Campagne[]
     */
    public function getIdCampagne(): Collection
    {
        return $this->idCampagne;
    }

    public function addIdCampagne(Campagne $idCampagne): self
    {
        if (!$this->idCampagne->contains($idCampagne)) {
            $this->idCampagne[] = $idCampagne;
            $idCampagne->setIdMessageSimple($this);
        }

        return $this;
    }

    public function removeIdCampagne(Campagne $idCampagne): self
    {
        if ($this->idCampagne->removeElement($idCampagne)) {
            // set the owning side to null (unless already changed)
            if ($idCampagne->getIdMessageSimple() === $this) {
                $idCampagne->setIdMessageSimple(null);
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
