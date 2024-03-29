<?php

namespace App\Entity;

use App\Repository\FilmsRepository;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FilmsRepository::class)]
/**
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Films
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'integer')]
    #[Assert\Length(exactly: 4, exactMessage: 'L\'année doit être écrite au format "YYYY."')]
    #[Assert\GreaterThanOrEqual(value: 1900, message: "L'année doit être supérieur ou égale à { compared_value }")]
    #[Assert\LessThanOrEqual(value: 2050, message: "L'année doit être inférieur ou égale à { compared_value }")]
    private $annee;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $genre_1;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $genre_2;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $genre_3;

    #[ORM\Column(type: 'string', length: 255)]
    private $acteurs;

    #[ORM\Column(type: 'text')]
    #[Assert\Length(min: 45, minMessage: "Ce synopsis est trop court.")]
    private $synopsis;

    #[ORM\Column(type: 'string', length: 255)]
    private $images;

    #[ORM\Column(type: 'integer')]
    private $duree;
    /**
     * Création d'une fonction pour permettre d'initialiser le slug  (avant le persist et avant la maj)
     * 
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function initializeSlug()
    {
        if (empty($this->slug)) {
            $slugify = new Slugify();
            $this->slug = $slugify->slugify($this->titre);
        };
    }

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $video;


    // #[ORM\Column(type: 'integer', nullable: true)]
    // private $genre_;


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
    public function getGenre1(): ?int
    {
        return $this->genre_1;
    }

    public function setGenre1(?int $genre_1): self
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

    public function getActeurs(): ?string
    {
        return $this->acteurs;
    }

    public function setActeurs(string $acteurs): self
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

    public function setImages(?string $images): self
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

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
    }

    // public function getGenre(): ?int
    // {
    //     return $this->genre_;
    // }

    // public function setGenre(?int $genre_): self
    // {
    //     $this->genre_ = $genre_;

    //     return $this;
    // }

}
