<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Cluster;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_projet;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_charge_dossier;

    #[ORM\Column(type: 'string', length: 255)]
    private $lieu_intervention;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'Projets')]
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCluster(): ?string
    {
        return $this->Cluster;
    }

    public function setCluster(string $Cluster): self
    {
        $this->Cluster = $Cluster;

        return $this;
    }

    public function getNomProjet(): ?string
    {
        return $this->Nom_projet;
    }

    public function setNomProjet(string $Nom_projet): self
    {
        $this->Nom_projet = $Nom_projet;

        return $this;
    }

    public function getNomChargeDossier(): ?string
    {
        return $this->Nom_charge_dossier;
    }

    public function setNomChargeDossier(string $Nom_charge_dossier): self
    {
        $this->Nom_charge_dossier = $Nom_charge_dossier;

        return $this;
    }

    public function getLieuIntervention(): ?string
    {
        return $this->lieu_intervention;
    }

    public function setLieuIntervention(string $lieu_intervention): self
    {
        $this->lieu_intervention = $lieu_intervention;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
