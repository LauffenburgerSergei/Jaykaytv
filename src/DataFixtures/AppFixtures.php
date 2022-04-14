<?php

namespace App\DataFixtures;
use App\Entity\Films;
use App\Entity\Genres;
use App\Entity\Series;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);


        // $film = new Films();
        // $film->setTitre("Blood Diamond")
        //     ->setAnnee(2007)
        //     ->setGenre1(11)
        //     ->setGenre2(3)
        //     ->setGenre3(8)
        //     ->setActeurs([
        //         "Leonardo DiCaprio", 
        //         "Djimon Hounsou", 
        //         "Jennifer Connelly"
        //     ])
        //     ->setSynopsis("Alors qu'il purge une peine de prison pour ses trafics, Archer rencontre Solomon Vandy, un pêcheur d'origine Mende. Arraché à sa famille et forcé de travailler dans les mines diamantifères, ce dernier a trouvé - et caché - un diamant rose extrêmement rare. Accompagnés de Maddy Bowen, une journaliste idéaliste, les deux hommes s'embarquent pour un dangereux voyage en territoire rebelle pour récupérer le fameux caillou. Un voyage qui pourrait bien sauver la famille de Salomon et donner à Archer la seconde chance qu'il n'espérait plus.")
        //     ->setImages("assets/website/images/films/18711805.jpg")
        //     ->setDuree(143);
        //     $manager->persist($film);


            // $serie = new Series();
            // $serie->setTitre("Dr House")
            // ->setAnnee(2004)
            // ->setAnneeFin(2012)
            // ->setGenre1(17)
            // ->setGenre2(3)
            // ->setGenre3(18)
            // ->setActeurs([
            //     "Hugh Laurie", 
            //     "Robert Sean Leonard", 
            //     "Jesse Spencer"
            // ])
            // ->setSynopsis("Le Dr Greg House est un médecin revêche qui ne fait confiance à personne, et encore moins à ses patients. Irrévérencieux et controversé, il n'en serait que plus heureux s'il pouvait ne pas adresser la parole à ses patients. Mais House est un brillant médecin. Et avec son équipe d'experts, il est prêt à tout pour résoudre les cas médicaux les plus mystérieux et sauver des vies.")
            // ->setImages("assets/website/images/films/dr-house-vignette_portrait-90bb84-0@1x.jpg")
            // ->setDureeEpisode(44)
            // ->setNombreEpisode(177)
            // ->setNombreSaison(8);
            // $manager->persist($serie);


        $genre = new Genres();
            $genre->setGenre("Médicale");
            $manager->persist($genre);
        

        $manager->flush();
    }
}
