<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ApiResource]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PhoneNumber = null;

    /**
     * @var Collection<int, Agents>
     */
    #[ORM\OneToMany(targetEntity: Agents::class, mappedBy: 'UtilisateurId')]
    private Collection $agents;

    /**
     * @var Collection<int, Teleconseillers>
     */
    #[ORM\OneToMany(targetEntity: Teleconseillers::class, mappedBy: 'UtilisateurId')]
    private Collection $teleconseillers;

    public function __construct()
    {
        $this->agents = new ArrayCollection();
        $this->teleconseillers = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber(?string $PhoneNumber): static
    {
        $this->PhoneNumber = $PhoneNumber;

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
            $agent->setUtilisateurId($this);
        }

        return $this;
    }

    public function removeAgent(Agents $agent): static
    {
        if ($this->agents->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getUtilisateurId() === $this) {
                $agent->setUtilisateurId(null);
            }
        }

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
            $teleconseiller->setUtilisateurId($this);
        }

        return $this;
    }

    public function removeTeleconseiller(Teleconseillers $teleconseiller): static
    {
        if ($this->teleconseillers->removeElement($teleconseiller)) {
            // set the owning side to null (unless already changed)
            if ($teleconseiller->getUtilisateurId() === $this) {
                $teleconseiller->setUtilisateurId(null);
            }
        }

        return $this;
    }
}
