<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TeleconseillersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeleconseillersRepository::class)]
#[ApiResource]
class Teleconseillers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'teleconseillers')]
    private ?Utilisateur $UtilisateurId = null;

    #[ORM\ManyToOne(inversedBy: 'teleconseillers')]
    private ?Prestataires $PrestataireId = null;

    #[ORM\Column]
    private ?bool $Responsable = null;

    /**
     * @var Collection<int, Incidents>
     */
    #[ORM\OneToMany(targetEntity: Incidents::class, mappedBy: 'TeleconseillerId')]
    private Collection $incidents;

    public function __construct()
    {
        $this->incidents = new ArrayCollection();
    }

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

    public function getPrestataireId(): ?Prestataires
    {
        return $this->PrestataireId;
    }

    public function setPrestataireId(?Prestataires $PrestataireId): static
    {
        $this->PrestataireId = $PrestataireId;

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
            $incident->setTeleconseillerId($this);
        }

        return $this;
    }

    public function removeIncident(Incidents $incident): static
    {
        if ($this->incidents->removeElement($incident)) {
            // set the owning side to null (unless already changed)
            if ($incident->getTeleconseillerId() === $this) {
                $incident->setTeleconseillerId(null);
            }
        }

        return $this;
    }
}
