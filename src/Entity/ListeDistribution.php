<?php

namespace App\Entity;

use App\Repository\ListeDistributionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeDistributionRepository::class)
 */
class ListeDistribution
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $abonnee;

    /**
     * @ORM\Column(type="array")
     */
    private $test = [];

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAbonnee(): ?string
    {
        return $this->abonnee;
    }

    public function setAbonnee(string $abonnee): self
    {
        $this->abonnee = $abonnee;

        return $this;
    }

    public function getTest(): ?array
    {
        return $this->test;
    }

    public function setTest(array $test): self
    {
        $this->test = $test;

        return $this;
    }
}
