<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AgentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgentsRepository::class)]
#[ApiResource]
class Agents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'agents')]
    private ?Utilisateur $UtilisateurId = null;

    #[ORM\ManyToOne(inversedBy: 'agents')]
    private ?EntitesSupports $EntiteId = null;

    #[ORM\Column]
    private ?bool $Responsable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurId(): ?Utilisateur
    {
        return $this->UtilisateurId;
    }

    public function setUtilisateurId(?Utilisateur $UtilisateurId): static
    {
        $this->UtilisateurId = $UtilisateurId;

        return $this;
    }

    public function getEntiteId(): ?EntitesSupports
    {
        return $this->EntiteId;
    }

    public function setEntiteId(?EntitesSupports $EntiteId): static
    {
        $this->EntiteId = $EntiteId;

        return $this;
    }

    public function isResponsable(): ?bool
    {
        return $this->Responsable;
    }

    public function setResponsable(bool $Responsable): static
    {
        $this->Responsable = $Responsable;

        return $this;
    }
}
