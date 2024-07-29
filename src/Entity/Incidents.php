<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\IncidentsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IncidentsRepository::class)]
#[ApiResource]
class Incidents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    private ?Canaux $CanalId = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    private ?Motifs $MotifId = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    private ?SousMotifs $SousMotifId = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Commentaire = null;

    #[ORM\Column(length: 255)]
    private ?string $StatutIncident = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    private ?Contacts $ContactId = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    private ?Services $ServiceId = null;

    #[ORM\Column]
    private ?bool $Disponiblite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateEcheance = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    private ?Priorite $PrioriteId = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    private ?Teleconseillers $TeleconseillerId = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    private ?EntitesSupports $EntiteSupportId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCanalId(): ?Canaux
    {
        return $this->CanalId;
    }

    public function setCanalId(?Canaux $CanalId): static
    {
        $this->CanalId = $CanalId;

        return $this;
    }

    public function getMotifId(): ?Motifs
    {
        return $this->MotifId;
    }

    public function setMotifId(?Motifs $MotifId): static
    {
        $this->MotifId = $MotifId;

        return $this;
    }

    public function getSousMotifId(): ?SousMotifs
    {
        return $this->SousMotifId;
    }

    public function setSousMotifId(?SousMotifs $SousMotifId): static
    {
        $this->SousMotifId = $SousMotifId;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?string $Commentaire): static
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getStatutIncident(): ?string
    {
        return $this->StatutIncident;
    }

    public function setStatutIncident(string $StatutIncident): static
    {
        $this->StatutIncident = $StatutIncident;

        return $this;
    }

    public function getContactId(): ?Contacts
    {
        return $this->ContactId;
    }

    public function setContactId(?Contacts $ContactId): static
    {
        $this->ContactId = $ContactId;

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

    public function isDisponiblite(): ?bool
    {
        return $this->Disponiblite;
    }

    public function setDisponiblite(bool $Disponiblite): static
    {
        $this->Disponiblite = $Disponiblite;

        return $this;
    }

    public function getDateEcheance(): ?\DateTimeInterface
    {
        return $this->DateEcheance;
    }

    public function setDateEcheance(?\DateTimeInterface $DateEcheance): static
    {
        $this->DateEcheance = $DateEcheance;

        return $this;
    }

    public function getPrioriteId(): ?Priorite
    {
        return $this->PrioriteId;
    }

    public function setPrioriteId(?Priorite $PrioriteId): static
    {
        $this->PrioriteId = $PrioriteId;

        return $this;
    }

    public function getTeleconseillerId(): ?Teleconseillers
    {
        return $this->TeleconseillerId;
    }

    public function setTeleconseillerId(?Teleconseillers $TeleconseillerId): static
    {
        $this->TeleconseillerId = $TeleconseillerId;

        return $this;
    }

    public function getEntiteSupportId(): ?EntitesSupports
    {
        return $this->EntiteSupportId;
    }

    public function setEntiteSupportId(?EntitesSupports $EntiteSupportId): static
    {
        $this->EntiteSupportId = $EntiteSupportId;

        return $this;
    }
}
