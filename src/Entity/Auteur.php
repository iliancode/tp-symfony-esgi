<?php

namespace App\Entity;

use App\Repository\AuteurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; // Ajouté pour les contraintes de validation
#[ORM\Entity(repositoryClass: AuteurRepository::class)]
class Auteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message: 'Le nom ne peut pas être vide')]
    private ?string $nom = null;

    #[ORM\Column]
    #[Assert\Positive (message: 'Le nombre de livre doit être positif')]
    private ?int $nombreLivre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNombreLivre(): ?int
    {
        return $this->nombreLivre;
    }

    public function setNombreLivre(int $nombreLivre): static
    {
        $this->nombreLivre = $nombreLivre;

        return $this;
    }
}
