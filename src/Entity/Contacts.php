<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ContactsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactsRepository::class)]
#[ApiResource]
class Contacts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $Telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $StatutContact = null;

    #[ORM\ManyToOne(inversedBy: 'contacts')]
    private ?Comptes $CompteId = null;

    /**
     * @var Collection<int, Incidents>
     */
    #[ORM\OneToMany(targetEntity: Incidents::class, mappedBy: 'ContactId')]
    private Collection $incidents;

    public function __construct()
    {
        $this->incidents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): static
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getStatutContact(): ?string
    {
        return $this->StatutContact;
    }

    public function setStatutContact(string $StatutContact): static
    {
        $this->StatutContact = $StatutContact;

        return $this;
    }

    public function getCompteId(): ?Comptes
    {
        return $this->CompteId;
    }

    public function setCompteId(?Comptes $CompteId): static
    {
        $this->CompteId = $CompteId;

        return $this;
    }

    /**
     * @return Collection<int, Incidents>
     */
    public function getIncidents(): Collection
    {
        return $this->incidents;
    }

    public function addIncident(Incidents $incident): static
    {
        if (!$this->incidents->contains($incident)) {
            $this->incidents->add($incident);
            $incident->setContactId($this);
        }

        return $this;
    }

    public function removeIncident(Incidents $incident): static
    {
        if ($this->incidents->removeElement($incident)) {
            // set the owning side to null (unless already changed)
            if ($incident->getContactId() === $this) {
                $incident->setContactId(null);
            }
        }

        return $this;
    }
}
