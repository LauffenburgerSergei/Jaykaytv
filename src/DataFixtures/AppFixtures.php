<?php

namespace App\DataFixtures;
use App\Entity\Films;
use App\Entity\Genres;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);


        $film = new Films();
        $film->setTitre("Dune")
            ->setAnnee(2021)
            ->setGenre1(4)
            ->setGenre2(3)
            ->setGenre3(1)
            ->setActeurs([
                "Timothée Chalamet",
                "Rebecca Ferguson",
                "Oscar Isaac"
            ])
            ->setSynopsis("L'histoire de Paul Atreides, jeune homme aussi doué que brillant, voué à connaître un destin hors du commun qui le dépasse totalement. Car s'il veut préserver l'avenir de sa famille et de son peuple, il devra se rendre sur la planète la plus dangereuse de l'univers – la seule à même de fournir la ressource la plus précieuse au monde, capable de décupler la puissance de l'humanité. Tandis que des forces maléfiques se disputent le contrôle de cette planète, seuls ceux qui parviennent à dominer leur peur pourront survivre…")
            ->setImages("assets/website/images/films/4633954.jpg")
            ->setDuree(156);
            $manager->persist($film);


        // $genre = new Genres();
        //     $genre->setGenre("Fantaisie");
        //     $manager->persist($genre);
        

        $manager->flush();
    }
}
