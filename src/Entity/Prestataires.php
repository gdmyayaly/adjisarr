<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PrestatairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestatairesRepository::class)]
#[ApiResource]
class Prestataires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomPrestateur = null;

    #[ORM\Column]
    private ?bool $Responsable = null;

    /**
     * @var Collection<int, Teleconseillers>
     */
    #[ORM\OneToMany(targetEntity: Teleconseillers::class, mappedBy: 'PrestataireId')]
    private Collection $teleconseillers;

    public function __construct()
    {
        $this->teleconseillers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrestateur(): ?string
    {
        return $this->NomPrestateur;
    }

    public function setNomPrestateur(string $NomPrestateur): static
    {
        $this->NomPrestateur = $NomPrestateur;

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
     * @return Collection<int, Teleconseillers>
     */
    public function getTeleconseillers(): Collection
    {
        return $this->teleconseillers;
    }

    public function addTeleconseiller(Teleconseillers $teleconseiller): static
    {
        if (!$this->teleconseillers->contains($teleconseiller)) {
            $this->teleconseillers->add($teleconseiller);
            $teleconseiller->setPrestataireId($this);
        }

        return $this;
    }

    public function removeTeleconseiller(Teleconseillers $teleconseiller): static
    {
        if ($this->teleconseillers->removeElement($teleconseiller)) {
            // set the owning side to null (unless already changed)
            if ($teleconseiller->getPrestataireId() === $this) {
                $teleconseiller->setPrestataireId(null);
            }
        }

        return $this;
    }
}
