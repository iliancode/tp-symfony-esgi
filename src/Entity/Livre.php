<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; // Ajouté pour les contraintes de validation
#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message: 'Le titre ne peut pas être vide')]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message: 'Le nom de l\'auteur ne peut pas être vide')]
    private ?string $auteur = null;

    #[ORM\Column]
    #[Assert\Positive (message: 'Le nombre de page doit être positif')]
    private ?int $nombrePage = null;

    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'livres')]
    private Collection $categorie;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getNombrePage(): ?int
    {
        return $this->nombrePage;
    }

    public function setNombrePage(int $nombrePage): static
    {
        $this->nombrePage = $nombrePage;

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categorie $categorie): static
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie->add($categorie);
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): static
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }
}
