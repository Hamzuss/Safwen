<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_Categorie;

    #[ORM\Column(type: 'array')]
    private $Type = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->Nom_Categorie;
    }

    public function setNomCategorie(string $Nom_Categorie): self
    {
        $this->Nom_Categorie = $Nom_Categorie;

        return $this;
    }

    public function getType(): ?array
    {
        return $this->Type;
    }

    public function setType(array $Type): self
    {
        $this->Type = $Type;

        return $this;
    }
}
