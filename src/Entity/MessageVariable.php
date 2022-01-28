<?php

namespace App\Entity;

use App\Repository\MessageVariableRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageVariableRepository::class)
 */
class MessageVariable
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
    private $langue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     */
    private $idUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numLigne;

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

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
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

    public function setType(?string $type): self
    {
        $this->type = $type;

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

    public function getNumLigne(): ?string
    {
        return $this->numLigne;
    }

    public function setNumLigne(string $numLigne): self
    {
        $this->numLigne = $numLigne;

        return $this;
    }
}
