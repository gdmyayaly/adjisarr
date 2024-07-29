<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SousMotifsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousMotifsRepository::class)]
#[ApiResource]
class SousMotifs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    /**
     * @var Collection<int, Incidents>
     */
    #[ORM\OneToMany(targetEntity: Incidents::class, mappedBy: 'SousMotifId')]
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
            $incident->setSousMotifId($this);
        }

        return $this;
    }

    public function removeIncident(Incidents $incident): static
    {
        if ($this->incidents->removeElement($incident)) {
            // set the owning side to null (unless already changed)
            if ($incident->getSousMotifId() === $this) {
                $incident->setSousMotifId(null);
            }
        }

        return $this;
    }
}
