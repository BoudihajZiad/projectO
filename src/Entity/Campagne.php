<?php

namespace App\Entity;

use App\Repository\CampagneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampagneRepository::class)
 */
class Campagne
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
    private $canal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $planification;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $silence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categoriePromotionnelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titreMessage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $corpsMessage;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="idCampagne")
     */
    private $idUser;

    /**
     * @ORM\ManyToOne(targetEntity=MessageSimple::class, inversedBy="idCampagne")
     */
    private $idMessageSimple;

    /**
     * @ORM\OneToMany(targetEntity=ListeDestinataire::class, mappedBy="idCampagne")
     */
    private $idListeDes;

    /**
     * @ORM\OneToMany(targetEntity=DestinataireCamp::class, mappedBy="idCampagne")
     */
    private $idContact;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dest;

    public function __construct()
    {
        $this->idListeDes = new ArrayCollection();
        $this->idContact = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCanal(): ?string
    {
        return $this->canal;
    }

    public function setCanal(?string $canal): self
    {
        $this->canal = $canal;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPlanification(): ?string
    {
        return $this->planification;
    }

    public function setPlanification(?string $planification): self
    {
        $this->planification = $planification;

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

    public function getSilence(): ?string
    {
        return $this->silence;
    }

    public function setSilence(?string $silence): self
    {
        $this->silence = $silence;

        return $this;
    }

    public function getCategoriePromotionnelle(): ?string
    {
        return $this->categoriePromotionnelle;
    }

    public function setCategoriePromotionnelle(string $categoriePromotionnelle): self
    {
        $this->categoriePromotionnelle = $categoriePromotionnelle;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getTitreMessage(): ?string
    {
        return $this->titreMessage;
    }

    public function setTitreMessage(?string $titreMessage): self
    {
        $this->titreMessage = $titreMessage;

        return $this;
    }

    public function getCorpsMessage(): ?string
    {
        return $this->corpsMessage;
    }

    public function setCorpsMessage(?string $corpsMessage): self
    {
        $this->corpsMessage = $corpsMessage;

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

    public function getIdMessageSimple(): ?MessageSimple
    {
        return $this->idMessageSimple;
    }

    public function setIdMessageSimple(?MessageSimple $idMessageSimple): self
    {
        $this->idMessageSimple = $idMessageSimple;

        return $this;
    }

    /**
     * @return Collection|ListeDestinataire[]
     */
    public function getIdListeDes(): Collection
    {
        return $this->idListeDes;
    }

    public function addIdListeDe(ListeDestinataire $idListeDe): self
    {
        if (!$this->idListeDes->contains($idListeDe)) {
            $this->idListeDes[] = $idListeDe;
            $idListeDe->setIdCampagne($this);
        }

        return $this;
    }

    public function removeIdListeDe(ListeDestinataire $idListeDe): self
    {
        if ($this->idListeDes->removeElement($idListeDe)) {
            // set the owning side to null (unless already changed)
            if ($idListeDe->getIdCampagne() === $this) {
                $idListeDe->setIdCampagne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DestinataireCamp[]
     */
    public function getIdContact(): Collection
    {
        return $this->idContact;
    }

    public function addIdContact(DestinataireCamp $idContact): self
    {
        if (!$this->idContact->contains($idContact)) {
            $this->idContact[] = $idContact;
            $idContact->setIdCampagne($this);
        }

        return $this;
    }

    public function removeIdContact(DestinataireCamp $idContact): self
    {
        if ($this->idContact->removeElement($idContact)) {
            // set the owning side to null (unless already changed)
            if ($idContact->getIdCampagne() === $this) {
                $idContact->setIdCampagne(null);
            }
        }

        return $this;
    }

    public function getIdd(): ?int
    {
        return $this->idd;
    }

    public function setIdd(?int $idd): self
    {
        $this->idd = $idd;

        return $this;
    }

    public function getDest(): ?string
    {
        return $this->dest;
    }

    public function setDest(?string $dest): self
    {
        $this->dest = $dest;

        return $this;
    }
}
