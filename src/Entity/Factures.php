<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FacturesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FacturesRepository::class)]
#[ApiResource]
class Factures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'factures')]
    private ?Comptes $CompteId = null;

    #[ORM\ManyToOne(inversedBy: 'factures')]
    private ?Services $ServiceId = null;

    #[ORM\Column]
    private ?int $Montant = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateFacturation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DatePaiement = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateExpiration = null;

    #[ORM\Column(length: 255)]
    private ?string $StatutFacture = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getServiceId(): ?Services
    {
        return $this->ServiceId;
    }

    public function setServiceId(?Services $ServiceId): static
    {
        $this->ServiceId = $ServiceId;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->Montant;
    }

    public function setMontant(int $Montant): static
    {
        $this->Montant = $Montant;

        return $this;
    }

    public function getDateFacturation(): ?\DateTimeInterface
    {
        return $this->DateFacturation;
    }

    public function setDateFacturation(\DateTimeInterface $DateFacturation): static
    {
        $this->DateFacturation = $DateFacturation;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->DatePaiement;
    }

    public function setDatePaiement(\DateTimeInterface $DatePaiement): static
    {
        $this->DatePaiement = $DatePaiement;

        return $this;
    }

    public function getDateExpiration(): ?\DateTimeInterface
    {
        return $this->DateExpiration;
    }

    public function setDateExpiration(\DateTimeInterface $DateExpiration): static
    {
        $this->DateExpiration = $DateExpiration;

        return $this;
    }

    public function getStatutFacture(): ?string
    {
        return $this->StatutFacture;
    }

    public function setStatutFacture(string $StatutFacture): static
    {
        $this->StatutFacture = $StatutFacture;

        return $this;
    }
}
