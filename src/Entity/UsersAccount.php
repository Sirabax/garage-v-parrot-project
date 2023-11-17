<?php

namespace App\Entity;

use App\Repository\UsersAccountRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersAccountRepository::class)]
class UsersAccount implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $mot_de_passe = null;

    #[ORM\Column(length: 255)]
    private ?string $type_utilisateur = null;

    public function __construct()
    {
        // ... your constructor logic ...
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    public function getTypeUtilisateur(): ?string
    {
        return $this->type_utilisateur;
    }

    public function setTypeUtilisateur(string $type_utilisateur): static
    {
        $this->type_utilisateur = $type_utilisateur;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = ['ROLE_USER'];

        if ($this->getTypeUtilisateur() === 'administrateur') {
            $roles[] = 'ROLE_ADMIN';
        } elseif ($this->getTypeUtilisateur() === 'employe') {
            $roles[] = 'ROLE_EMPLOYE';
        }

        return $roles;
    }

    public function getPassword(): ?string
    {
        return $this->mot_de_passe;
    }

    public function getSalt()
    {
        // You don't need a salt with modern password hashing (bcrypt, argon2)
        return null;
    }

    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, erase it here
    }

    public function getUserIdentifier(): string
    {
        return $this->getEmail();
    }

    public function setPassword(string $password): self
    {
        $this->mot_de_passe = $password;

        return $this;
    }
}
