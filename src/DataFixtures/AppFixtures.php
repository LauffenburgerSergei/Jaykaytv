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




        // Film

        // $film = new Films();
        // $film->setTitre("Top Gun")
        //     ->setAnnee(1986)
        //     ->setGenre1(1)
        //     ->setGenre2(3)
        //     ->setGenre3(6)
        //     ->setActeurs([
        //         "Tom Cruise", 
        //         "Kelly McGillis", 
        //         "Tom Skerritt"
        //     ])
        //     ->setSynopsis("Jeune as du pilotage et tête brûlée d'une école réservée à l'élite de l'aéronavale US (\"Top Gun\"), Pete Mitchell, dit \"Maverick\", tombe sous le charme d'une instructrice alors qu'il est en compétition pour le titre du meilleur pilote...")
        //     ->setImages("build/website/images/films/top_gun.jpg")
        //     ->setDuree(110);
        //     $manager->persist($film);




            // serie


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



                // genre

                    // $genre = new Genres();
                    //     $genre->setGenre("Médicale");
                    //     $manager->persist($genre);
        

                $manager->flush();
    }
}
