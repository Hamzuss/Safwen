<?php

namespace App\Entity;

use App\Repository\ExpertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: ExpertRepository::class)]
class Expert implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'string', length: 255)]
    private $FirstName;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $tel;

    #[ORM\Column(type: 'string', length: 255)]
    private $Etat;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Nombre_H_Fait;

    #[ORM\OneToMany(mappedBy: 'Expert', targetEntity: FicheIntervention::class)]
    private $Fiches;

    public function __construct()
    {
        $this->Fiches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->Etat;
    }

    public function setEtat(string $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }

    public function getNombreHFait(): ?int
    {
        return $this->Nombre_H_Fait;
    }

    public function setNombreHFait(?int $Nombre_H_Fait): self
    {
        $this->Nombre_H_Fait = $Nombre_H_Fait;

        return $this;
    }

    public function getContrats(): ?string
    {
        return $this->Contrats;
    }

    public function setContrats(string $Contrats): self
    {
        $this->Contrats = $Contrats;

        return $this;
    }

    /**
     * @return Collection<int, FicheIntervention>
     */
    public function getFiches(): Collection
    {
        return $this->Fiches;
    }

    public function addFich(FicheIntervention $fich): self
    {
        if (!$this->Fiches->contains($fich)) {
            $this->Fiches[] = $fich;
            $fich->setExpert($this);
        }

        return $this;
    }

    public function removeFich(FicheIntervention $fich): self
    {
        if ($this->Fiches->removeElement($fich)) {
            // set the owning side to null (unless already changed)
            if ($fich->getExpert() === $this) {
                $fich->setExpert(null);
            }
        }

        return $this;
    }
}
