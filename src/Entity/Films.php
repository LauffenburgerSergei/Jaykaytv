<?php

namespace App\Entity;

use App\Repository\FilmsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmsRepository::class)]
class Films
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'integer')]
    private $annee;

    #[ORM\Column(type: 'integer', nullable: false)]
    private $genre_1;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $genre_2;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $genre_3;

    #[ORM\Column(type: 'array')]
    private $acteurs = [];

    #[ORM\Column(type: 'text')]
    private $synopsis;

    #[ORM\Column(type: 'string', length: 255)]
    private $images;

    #[ORM\Column(type: 'integer')]
    private $duree;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getGenre1(): ?string
    {
        return $this->genre_1;
    }

    public function setGenre1(string $genre_1): self
    {
        $this->genre_1 = $genre_1;

        return $this;
    }

    public function getGenre2(): ?int
    {
        return $this->genre_2;
    }

    public function setGenre2(?int $genre_2): self
    {
        $this->genre_2 = $genre_2;

        return $this;
    }

    public function getGenre3(): ?int
    {
        return $this->genre_3;
    }

    public function setGenre3(?int $genre_3): self
    {
        $this->genre_3 = $genre_3;

        return $this;
    }

    public function getActeurs(): ?array
    {
        return $this->acteurs;
    }

    public function setActeurs(array $acteurs): self
    {
        $this->acteurs = $acteurs;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(string $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }
}
