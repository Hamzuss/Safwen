<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_Complet;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_chargé_dossier;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $pays;

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'clients')]
    private $categorie;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Projet::class)]
    private $Projets;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Contrat::class)]
    private $Contrats;

    public function __construct()
    {
        $this->Projets = new ArrayCollection();
        $this->Contrats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getNomComplet(): ?string
    {
        return $this->Nom_Complet;
    }

    public function setNomComplet(string $Nom_Complet): self
    {
        $this->Nom_Complet = $Nom_Complet;

        return $this;
    }

    public function getNomChargéDossier(): ?string
    {
        return $this->Nom_chargé_dossier;
    }

    public function setNomChargéDossier(string $Nom_chargé_dossier): self
    {
        $this->Nom_chargé_dossier = $Nom_chargé_dossier;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getProjets(): Collection
    {
        return $this->Projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->Projets->contains($projet)) {
            $this->Projets[] = $projet;
            $projet->setClient($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->Projets->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getClient() === $this) {
                $projet->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        return $this->Contrats;
    }

    public function addContrat(Contrat $contrat): self
    {
        if (!$this->Contrats->contains($contrat)) {
            $this->Contrats[] = $contrat;
            $contrat->setClient($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->Contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getClient() === $this) {
                $contrat->setClient(null);
            }
        }

        return $this;
    }
}
