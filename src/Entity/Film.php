<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $relation;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    #[ORM\Column(type: 'integer')]
    private $annee;

    #[ORM\ManyToMany(targetEntity: Genre::class)]
    private $genre_1;

    #[ORM\ManyToMany(targetEntity: Genre::class)]
    private $genre_2;

    #[ORM\ManyToMany(targetEntity: Genre::class)]
    private $Genre_3;

    #[ORM\Column(type: 'array')]
    private $acteurs = [];

    #[ORM\Column(type: 'text')]
    private $synopsis;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\Column(type: 'integer')]
    private $duree;

    public function __construct()
    {
        $this->genre_4 = new ArrayCollection();
        $this->genre_1 = new ArrayCollection();
        $this->genre_2 = new ArrayCollection();
        $this->Genre_3 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * @return Collection<int, Genres>
     */

    public function getGenre5(): ?Genres
    {
        return $this->genre_5;
    }

    public function setGenre5(Genres $genre_5): self
    {
        $this->genre_5 = $genre_5;

        return $this;
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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

    /**
     * @return Collection<int, Genres>
     */
    public function getGenre1(): Collection
    {
        return $this->genre_1;
    }

    public function addGenre1(Genres $genre1): self
    {
        if (!$this->genre_1->contains($genre1)) {
            $this->genre_1[] = $genre1;
        }

        return $this;
    }

    public function removeGenre1(Genres $genre1): self
    {
        $this->genre_1->removeElement($genre1);

        return $this;
    }

    /**
     * @return Collection<int, Genres>
     */
    public function getGenre2(): Collection
    {
        return $this->genre_2;
    }

    public function addGenre2(Genres $genre2): self
    {
        if (!$this->genre_2->contains($genre2)) {
            $this->genre_2[] = $genre2;
        }

        return $this;
    }

    public function removeGenre2(Genres $genre2): self
    {
        $this->genre_2->removeElement($genre2);

        return $this;
    }

    /**
     * @return Collection<int, Genres>
     */
    public function getGenre3(): Collection
    {
        return $this->Genre_3;
    }

    public function addGenre3(Genres $genre3): self
    {
        if (!$this->Genre_3->contains($genre3)) {
            $this->Genre_3[] = $genre3;
        }

        return $this;
    }

    public function removeGenre3(Genres $genre3): self
    {
        $this->Genre_3->removeElement($genre3);

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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
