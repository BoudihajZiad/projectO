<?php

namespace App\Entity;

use App\Repository\DestinataireCampRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestinataireCampRepository::class)
 */
class DestinataireCamp
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
     * @ORM\Column(type="integer")
     */
    private $nbDest;

    /**
     * @ORM\ManyToOne(targetEntity=Contact::class, inversedBy="idCamp")
     */
    private $idContact;

    /**
     * @ORM\Column(type="integer")
     */
    private $iddCampagne;

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

    public function getNbDest(): ?int
    {
        return $this->nbDest;
    }

    public function setNbDest(int $nbDest): self
    {
        $this->nbDest = $nbDest;

        return $this;
    }

    public function getIdContact(): ?Contact
    {
        return $this->idContact;
    }

    public function setIdContact(?Contact $idContact): self
    {
        $this->idContact = $idContact;

        return $this;
    }

    public function getIddCampagne(): ?int
    {
        return $this->iddCampagne;
    }

    public function setIddCampagne(int $iddCampagne): self
    {
        $this->iddCampagne = $iddCampagne;

        return $this;
    }
}
