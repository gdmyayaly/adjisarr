<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ComptesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComptesRepository::class)]
#[ApiResource]
class Comptes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomCompte = null;

    #[ORM\Column(length: 255)]
    private ?string $TypeCompte = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateOuverture = null;

    #[ORM\Column(length: 255)]
    private ?string $StatutCompte = null;

    #[ORM\Column]
    private ?int $Solde = null;

    /**
     * @var Collection<int, Contacts>
     */
    #[ORM\OneToMany(targetEntity: Contacts::class, mappedBy: 'CompteId')]
    private Collection $contacts;

    /**
     * @var Collection<int, Factures>
     */
    #[ORM\OneToMany(targetEntity: Factures::class, mappedBy: 'CompteId')]
    private Collection $factures;

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
        $this->factures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCompte(): ?string
    {
        return $this->NomCompte;
    }

    public function setNomCompte(string $NomCompte): static
    {
        $this->NomCompte = $NomCompte;

        return $this;
    }

    public function getTypeCompte(): ?string
    {
        return $this->TypeCompte;
    }

    public function setTypeCompte(string $TypeCompte): static
    {
        $this->TypeCompte = $TypeCompte;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->DateOuverture;
    }

    public function setDateOuverture(\DateTimeInterface $DateOuverture): static
    {
        $this->DateOuverture = $DateOuverture;

        return $this;
    }

    public function getStatutCompte(): ?string
    {
        return $this->StatutCompte;
    }

    public function setStatutCompte(string $StatutCompte): static
    {
        $this->StatutCompte = $StatutCompte;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->Solde;
    }

    public function setSolde(int $Solde): static
    {
        $this->Solde = $Solde;

        return $this;
    }

    /**
     * @return Collection<int, Contacts>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contacts $contact): static
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts->add($contact);
            $contact->setCompteId($this);
        }

        return $this;
    }

    public function removeContact(Contacts $contact): static
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getCompteId() === $this) {
                $contact->setCompteId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Factures>
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    public function addFacture(Factures $facture): static
    {
        if (!$this->factures->contains($facture)) {
            $this->factures->add($facture);
            $facture->setCompteId($this);
        }

        return $this;
    }

    public function removeFacture(Factures $facture): static
    {
        if ($this->factures->removeElement($facture)) {
            // set the owning side to null (unless already changed)
            if ($facture->getCompteId() === $this) {
                $facture->setCompteId(null);
            }
        }

        return $this;
    }
}
