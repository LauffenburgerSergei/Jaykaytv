<?php

namespace App\Entity;

use App\Repository\SeriesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SeriesRepository::class)]
class Series
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'integer')]
    #[Assert\Length(exactly: 4, exactMessage:'L\'année doit être écrite au format "YYYY."')]
    #[Assert\GreaterThanOrEqual(value: 1900, message:"L'année doit être supérieur ou égale à {{ compared_value }}")]
    #[Assert\LessThanOrEqual( value: 2050,message: "L'année doit être inférieur ou égale à {{ compared_value }}")]
    private $annee;

    #[ORM\Column(type: 'integer', nullable: false)]
    #[Assert\LessThan(255)]
    private $genre_1;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $genre_2;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $genre_3;

    #[ORM\Column(type: 'string', length: 255)]
    private $acteurs;

    #[ORM\Column(type: 'text')]
    #[Assert\Length(min :45, minMessage:"Ce synopsis est trop court.")]
    private $synopsis;

    #[ORM\Column(type: 'string', length: 255)]
    private $images;

    #[ORM\Column(type: 'integer')]
    private $duree_episode;

    #[ORM\Column(type: 'integer')]
    private $nombre_episode;

    #[ORM\Column(type: 'integer')]
    private $nombre_saison;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\Length(exactly: 4, exactMessage:'L\'année doit être écrite au format "YYYY."')]
    #[Assert\GreaterThanOrEqual(value: 1900, message:"L'année doit être supérieur ou égale à {{ compared_value }}")]
    #[Assert\LessThanOrEqual( value: 2050,message: "L'année doit être inférieur ou égale à {{ compared_value }}")]
    private $annee_fin;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $video;

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

    public function setGenre1(int $genre_1): self
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

    public function setImages(string $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getDureeEpisode(): ?int
    {
        return $this->duree_episode;
    }

    public function setDureeEpisode(int $duree_episode): self
    {
        $this->duree_episode = $duree_episode;

        return $this;
    }

    public function getNombreEpisode(): ?int
    {
        return $this->nombre_episode;
    }

    public function setNombreEpisode(int $nombre_episode): self
    {
        $this->nombre_episode = $nombre_episode;

        return $this;
    }

    public function getNombreSaison(): ?int
    {
        return $this->nombre_saison;
    }

    public function setNombreSaison(int $nombre_saison): self
    {
        $this->nombre_saison = $nombre_saison;

        return $this;
    }

    public function getAnneeFin(): ?int
    {
        return $this->annee_fin;
    }

    public function setAnneeFin(?int $annee_fin): self
    {
        $this->annee_fin = $annee_fin;

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
}
