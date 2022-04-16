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

    #[ORM\ManyToMany(targetEntity: Genres::class, inversedBy: 'oupsi')]
    private $genre_4;

    #[ORM\OneToOne(targetEntity: Genres::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $genre_5;

    public function __construct()
    {
        $this->genre_4 = new ArrayCollection();
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
}
