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
        $film->setTitre("Blood Diamond")
            ->setAnnee(2007)
            ->setGenre1(11)
            ->setGenre2(3)
            ->setGenre3(8)
            ->setActeurs([
                "Leonardo DiCaprio", 
                "Djimon Hounsou", 
                "Jennifer Connelly"
            ])
            ->setSynopsis("Alors qu'il purge une peine de prison pour ses trafics, Archer rencontre Solomon Vandy, un pêcheur d'origine Mende. Arraché à sa famille et forcé de travailler dans les mines diamantifères, ce dernier a trouvé - et caché - un diamant rose extrêmement rare. Accompagnés de Maddy Bowen, une journaliste idéaliste, les deux hommes s'embarquent pour un dangereux voyage en territoire rebelle pour récupérer le fameux caillou. Un voyage qui pourrait bien sauver la famille de Salomon et donner à Archer la seconde chance qu'il n'espérait plus.")
            ->setImages("assets/website/images/films/18711805.jpg")
            ->setDuree(143);
            $manager->persist($film);


        // $genre = new Genres();
        //     $genre->setGenre("Historique");
        //     $manager->persist($genre);
        

        $manager->flush();
    }
}
