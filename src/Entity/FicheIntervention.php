<?php

namespace App\Entity;

use App\Repository\FicheInterventionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheInterventionRepository::class)]
class FicheIntervention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_intervention;

    #[ORM\Column(type: 'date')]
    private $date_intervention;

    #[ORM\Column(type: 'array')]
    private $type_intervention = [];

    #[ORM\Column(type: 'integer')]
    private $nombre_heure_realise;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $lieu_intervention;

    #[ORM\ManyToOne(targetEntity: Expert::class, inversedBy: 'Fiches')]
    private $Expert;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomIntervention(): ?string
    {
        return $this->Nom_intervention;
    }

    public function setNomIntervention(string $Nom_intervention): self
    {
        $this->Nom_intervention = $Nom_intervention;

        return $this;
    }

    public function getDateIntervention(): ?\DateTimeInterface
    {
        return $this->date_intervention;
    }

    public function setDateIntervention(\DateTimeInterface $date_intervention): self
    {
        $this->date_intervention = $date_intervention;

        return $this;
    }

    public function getTypeIntervention(): ?array
    {
        return $this->type_intervention;
    }

    public function setTypeIntervention(array $type_intervention): self
    {
        $this->type_intervention = $type_intervention;

        return $this;
    }

    public function getNombreHeureRealise(): ?int
    {
        return $this->nombre_heure_realise;
    }

    public function setNombreHeureRealise(int $nombre_heure_realise): self
    {
        $this->nombre_heure_realise = $nombre_heure_realise;

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

    public function getLieuIntervention(): ?string
    {
        return $this->lieu_intervention;
    }

    public function setLieuIntervention(string $lieu_intervention): self
    {
        $this->lieu_intervention = $lieu_intervention;

        return $this;
    }

    public function getExpert(): ?Expert
    {
        return $this->Expert;
    }

    public function setExpert(?Expert $Expert): self
    {
        $this->Expert = $Expert;

        return $this;
    }
}
