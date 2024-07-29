<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
#[ApiResource]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomService = null;

    #[ORM\Column(length: 255)]
    private ?string $TypeService = null;

    #[ORM\ManyToOne(inversedBy: 'services')]
    private ?TypeServices $TypeServiceId = null;

    /**
     * @var Collection<int, Factures>
     */
    #[ORM\OneToMany(targetEntity: Factures::class, mappedBy: 'ServiceId')]
    private Collection $factures;

    /**
     * @var Collection<int, Incidents>
     */
    #[ORM\OneToMany(targetEntity: Incidents::class, mappedBy: 'ServiceId')]
    private Collection $incidents;

    public function __construct()
    {
        $this->factures = new ArrayCollection();
        $this->incidents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->NomService;
    }

    public function setNomService(string $NomService): static
    {
        $this->NomService = $NomService;

        return $this;
    }

    public function getTypeService(): ?string
    {
        return $this->TypeService;
    }

    public function setTypeService(string $TypeService): static
    {
        $this->TypeService = $TypeService;

        return $this;
    }

    public function getTypeServiceId(): ?TypeServices
    {
        return $this->TypeServiceId;
    }

    public function setTypeServiceId(?TypeServices $TypeServiceId): static
    {
        $this->TypeServiceId = $TypeServiceId;

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
            $facture->setServiceId($this);
        }

        return $this;
    }

    public function removeFacture(Factures $facture): static
    {
        if ($this->factures->removeElement($facture)) {
            // set the owning side to null (unless already changed)
            if ($facture->getServiceId() === $this) {
                $facture->setServiceId(null);
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
            $incident->setServiceId($this);
        }

        return $this;
    }

    public function removeIncident(Incidents $incident): static
    {
        if ($this->incidents->removeElement($incident)) {
            // set the owning side to null (unless already changed)
            if ($incident->getServiceId() === $this) {
                $incident->setServiceId(null);
            }
        }

        return $this;
    }
}
