<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EntitesSupportsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntitesSupportsRepository::class)]
#[ApiResource]
class EntitesSupports
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomEntite = null;

    /**
     * @var Collection<int, Agents>
     */
    #[ORM\OneToMany(targetEntity: Agents::class, mappedBy: 'EntiteId')]
    private Collection $agents;

    /**
     * @var Collection<int, Incidents>
     */
    #[ORM\OneToMany(targetEntity: Incidents::class, mappedBy: 'EntiteSupportId')]
    private Collection $incidents;

    public function __construct()
    {
        $this->agents = new ArrayCollection();
        $this->incidents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntite(): ?string
    {
        return $this->NomEntite;
    }

    public function setNomEntite(string $NomEntite): static
    {
        $this->NomEntite = $NomEntite;

        return $this;
    }

    /**
     * @return Collection<int, Agents>
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    public function addAgent(Agents $agent): static
    {
        if (!$this->agents->contains($agent)) {
            $this->agents->add($agent);
            $agent->setEntiteId($this);
        }

        return $this;
    }

    public function removeAgent(Agents $agent): static
    {
        if ($this->agents->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getEntiteId() === $this) {
                $agent->setEntiteId(null);
            }
        }

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
            $incident->setEntiteSupportId($this);
        }

        return $this;
    }

    public function removeIncident(Incidents $incident): static
    {
        if ($this->incidents->removeElement($incident)) {
            // set the owning side to null (unless already changed)
            if ($incident->getEntiteSupportId() === $this) {
                $incident->setEntiteSupportId(null);
            }
        }

        return $this;
    }
}
