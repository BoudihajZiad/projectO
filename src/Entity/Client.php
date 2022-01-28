<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idConnexion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlDelivery;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $canalPrefere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alerteStatut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $languePrefere;

    /**
     * @ORM\OneToMany(targetEntity=Contact::class, mappedBy="idUser")
     */
    private $idContact;

    /**
     * @ORM\OneToMany(targetEntity=Campagne::class, mappedBy="idUser")
     */
    private $idCampagne;

    /**
     * @ORM\OneToMany(targetEntity=Alerte::class, mappedBy="idUser")
     */
    private $alertes;

    /**
     * @ORM\OneToMany(targetEntity=MessageSimple::class, mappedBy="idUser")
     */
    private $idMessageSimple;

    /**
     * @ORM\OneToMany(targetEntity=LabelService::class, mappedBy="idUser")
     */
    private $idLabel;

    /**
     * @ORM\OneToMany(targetEntity=GroupeContact::class, mappedBy="idUser")
     */
    private $idGroupe;

    public function __construct()
    {
        $this->idContact = new ArrayCollection();
        $this->idCampagne = new ArrayCollection();
        $this->alertes = new ArrayCollection();
        $this->idMessageSimple = new ArrayCollection();
        $this->idLabel = new ArrayCollection();
        $this->idGroupe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getIdConnexion(): ?string
    {
        return $this->idConnexion;
    }

    public function setIdConnexion(string $idConnexion): self
    {
        $this->idConnexion = $idConnexion;

        return $this;
    }

    public function getUrlDelivery(): ?string
    {
        return $this->urlDelivery;
    }

    public function setUrlDelivery(?string $urlDelivery): self
    {
        $this->urlDelivery = $urlDelivery;

        return $this;
    }

    public function getCanalPrefere(): ?string
    {
        return $this->canalPrefere;
    }

    public function setCanalPrefere(?string $canalPrefere): self
    {
        $this->canalPrefere = $canalPrefere;

        return $this;
    }

    public function getAlerteStatut(): ?string
    {
        return $this->alerteStatut;
    }

    public function setAlerteStatut(?string $alerteStatut): self
    {
        $this->alerteStatut = $alerteStatut;

        return $this;
    }

    public function getLanguePrefere(): ?string
    {
        return $this->languePrefere;
    }

    public function setLanguePrefere(string $languePrefere): self
    {
        $this->languePrefere = $languePrefere;

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
            $idContact->setIdUser($this);
        }

        return $this;
    }

    public function removeIdContact(Contact $idContact): self
    {
        if ($this->idContact->removeElement($idContact)) {
            // set the owning side to null (unless already changed)
            if ($idContact->getIdUser() === $this) {
                $idContact->setIdUser(null);
            }
        }

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
            $idCampagne->setIdUser($this);
        }

        return $this;
    }

    public function removeIdCampagne(Campagne $idCampagne): self
    {
        if ($this->idCampagne->removeElement($idCampagne)) {
            // set the owning side to null (unless already changed)
            if ($idCampagne->getIdUser() === $this) {
                $idCampagne->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Alerte[]
     */
    public function getAlertes(): Collection
    {
        return $this->alertes;
    }

    public function addAlerte(Alerte $alerte): self
    {
        if (!$this->alertes->contains($alerte)) {
            $this->alertes[] = $alerte;
            $alerte->setIdUser($this);
        }

        return $this;
    }

    public function removeAlerte(Alerte $alerte): self
    {
        if ($this->alertes->removeElement($alerte)) {
            // set the owning side to null (unless already changed)
            if ($alerte->getIdUser() === $this) {
                $alerte->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MessageSimple[]
     */
    public function getIdMessageSimple(): Collection
    {
        return $this->idMessageSimple;
    }

    public function addIdMessageSimple(MessageSimple $idMessageSimple): self
    {
        if (!$this->idMessageSimple->contains($idMessageSimple)) {
            $this->idMessageSimple[] = $idMessageSimple;
            $idMessageSimple->setIdUser($this);
        }

        return $this;
    }

    public function removeIdMessageSimple(MessageSimple $idMessageSimple): self
    {
        if ($this->idMessageSimple->removeElement($idMessageSimple)) {
            // set the owning side to null (unless already changed)
            if ($idMessageSimple->getIdUser() === $this) {
                $idMessageSimple->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LabelService[]
     */
    public function getIdLabel(): Collection
    {
        return $this->idLabel;
    }

    public function addIdLabel(LabelService $idLabel): self
    {
        if (!$this->idLabel->contains($idLabel)) {
            $this->idLabel[] = $idLabel;
            $idLabel->setIdUser($this);
        }

        return $this;
    }

    public function removeIdLabel(LabelService $idLabel): self
    {
        if ($this->idLabel->removeElement($idLabel)) {
            // set the owning side to null (unless already changed)
            if ($idLabel->getIdUser() === $this) {
                $idLabel->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|GroupeContact[]
     */
    public function getIdGroupe(): Collection
    {
        return $this->idGroupe;
    }

    public function addIdGroupe(GroupeContact $idGroupe): self
    {
        if (!$this->idGroupe->contains($idGroupe)) {
            $this->idGroupe[] = $idGroupe;
            $idGroupe->setIdUser($this);
        }

        return $this;
    }

    public function removeIdGroupe(GroupeContact $idGroupe): self
    {
        if ($this->idGroupe->removeElement($idGroupe)) {
            // set the owning side to null (unless already changed)
            if ($idGroupe->getIdUser() === $this) {
                $idGroupe->setIdUser(null);
            }
        }

        return $this;
    }
}
