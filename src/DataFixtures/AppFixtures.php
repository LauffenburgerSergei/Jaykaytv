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
        // $film->setTitre("First Man")
        //     ->setAnnee(2018)
        //     ->setGenre1(3)
        //     ->setGenre2(9)
        //     // ->setGenre3(15)
        //     ->setActeurs([
        //         "Ryan Gosling", "Claire Foy", "Jason Clarke"
        //     ])
        //     ->setSynopsis("Pilote jugé « un peu distrait » par ses supérieurs en 1961, Neil Armstrong sera, le 21 juillet 1969, le premier homme à marcher sur la lune. Durant huit ans, il subit un entraînement de plus en plus difficile, assumant courageusement tous les risques d’un voyage vers l’inconnu total. Meurtri par des épreuves personnelles qui laissent des traces indélébiles, Armstrong tente d’être un mari aimant auprès d’une femme qui l’avait épousé en espérant une vie normale.")
        //     ->setImages("build/website/images/films/First_Man.jpg")
        //     ->setDuree(142);
        //     $manager->persist($film);




            // serie


            // $serie = new Series();
            // $serie->setTitre("NCIS")
            // ->setAnnee(2003)
            // // ->setAnneeFin(2020)
            // ->setGenre1(3)
            // ->setGenre2(16)
            // // ->setGenre3(6)
            // ->setActeurs([
            //       "Mark Harmon", "Gary Cole", "Sean Murray"
            // ])
            // ->setSynopsis("La Naval Criminal Investigative Service regroupe une équipe d'agents spéciaux chargés d'enquêter sur des crimes concernant la Marine.")
            // ->setImages("build/website/images/series/ncis.jpg")
            // ->setDureeEpisode(42)
            // ->setNombreEpisode(458)
            // ->setNombreSaison(20);
            // $manager->persist($serie);



                // genre

                    // $genre = new Genres();
                    //     $genre->setGenre("Western");
                    //     $manager->persist($genre);
        

                $manager->flush();
    }
}
