<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'integer')]
    private $NumContrat;

    #[ORM\Column(type: 'date')]
    private $Start;

    #[ORM\Column(type: 'date')]
    private $End;

    #[ORM\Column(type: 'integer')]
    private $Nombre_H_total;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Nombre_H_restant;

    #[ORM\Column(type: 'string', length: 255)]
    private $Etat_Contrat;

    #[ORM\Column(type: 'string', length: 255)]
    private $Description;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $prix;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $forfait;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $frais_transport;

    #[ORM\Column(type: 'array')]
    private $type = [];

    #[ORM\Column(type: 'integer')]
    private $Num_contrat_cadre;

    #[ORM\Column(type: 'integer')]
    private $nombre_expert_jours;

    #[ORM\Column(type: 'integer')]
    private $homme_jours_expert;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'Contrats')]
    private $client;

    #[ORM\Column(type: 'array')]
    private $Team_Experts = [];

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

    public function getNumContrat(): ?int
    {
        return $this->NumContrat;
    }

    public function setNumContrat(int $NumContrat): self
    {
        $this->NumContrat = $NumContrat;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->Start;
    }

    public function setStart(\DateTimeInterface $Start): self
    {
        $this->Start = $Start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->End;
    }

    public function setEnd(\DateTimeInterface $End): self
    {
        $this->End = $End;

        return $this;
    }

    public function getNombreHTotal(): ?int
    {
        return $this->Nombre_H_total;
    }

    public function setNombreHTotal(int $Nombre_H_total): self
    {
        $this->Nombre_H_total = $Nombre_H_total;

        return $this;
    }

    public function getNombreHRestant(): ?int
    {
        return $this->Nombre_H_restant;
    }

    public function setNombreHRestant(?int $Nombre_H_restant): self
    {
        $this->Nombre_H_restant = $Nombre_H_restant;

        return $this;
    }

    public function getEtatContrat(): ?string
    {
        return $this->Etat_Contrat;
    }

    public function setEtatContrat(string $Etat_Contrat): self
    {
        $this->Etat_Contrat = $Etat_Contrat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getForfait(): ?string
    {
        return $this->forfait;
    }

    public function setForfait(string $forfait): self
    {
        $this->forfait = $forfait;

        return $this;
    }

    public function getFraisTransport(): ?string
    {
        return $this->frais_transport;
    }

    public function setFraisTransport(string $frais_transport): self
    {
        $this->frais_transport = $frais_transport;

        return $this;
    }

    public function getType(): ?array
    {
        return $this->type;
    }

    public function setType(array $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNumContratCadre(): ?int
    {
        return $this->Num_contrat_cadre;
    }

    public function setNumContratCadre(int $Num_contrat_cadre): self
    {
        $this->Num_contrat_cadre = $Num_contrat_cadre;

        return $this;
    }

    public function getNombreExpertJours(): ?int
    {
        return $this->nombre_expert_jours;
    }

    public function setNombreExpertJours(int $nombre_expert_jours): self
    {
        $this->nombre_expert_jours = $nombre_expert_jours;

        return $this;
    }

    public function getHommeJoursExpert(): ?int
    {
        return $this->homme_jours_expert;
    }

    public function setHommeJoursExpert(int $homme_jours_expert): self
    {
        $this->homme_jours_expert = $homme_jours_expert;

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

    public function getTeamExperts(): ?array
    {
        return $this->Team_Experts;
    }

    public function setTeamExperts(array $Team_Experts): self
    {
        $this->Team_Experts = $Team_Experts;

        return $this;
    }
}
