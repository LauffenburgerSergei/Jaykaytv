<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Films;
use App\Repository\FilmsRepository;

class FilmController extends AbstractController
{
    #[Route('/film', name: 'app_film')]
    public function index(ManagerRegistry $doctrine,FilmsRepository $films): Response
    {        
        //Récupère l'object en fonction de l'id 
        return $this->render('film/film.html.twig', [
            'controller_name' => 'FilmController',
            'page_title' => 'Films',
            'films'=>$films->findAll()
        ]);
    }
//  
    /**
     * Affiche les détails d'un film
     * @Route("/film/{id}", name="film.show")
     * 
     * @return Response
     */
    //  #[Route('/film/{$id}', name: 'film.show')]
    public function show(FilmsRepository $repository, $id): Response
    {
        
        if(!is_numeric($id)){
            $response = "L'identifiant est incorrect. Le format attendu est numérique.";
                        return $this->render('film/none.html.twig',[
                 'page_title' => 'Film inconnu',
                 'id'=>$id,
                 'response'=>$response,
            ]);
        }
        $film = $repository->findOneById($id);
        if(!$film){   
            $response="Aucun film ne correspond à l'identifiant {{id}}";         
            return $this->render('film/none.html.twig',[
                 'page_title' => 'Film inconnu',
                 'id'=>$id,
                 'response'=>$response,
            ]);
        };
        // var_dump($film); 
        //$film['titre'],
        return $this->render('film/show.html.twig', [
            'page_title' => "",
            'film'=>$film,
            ]);
    }


    // /**
    //  * Permet l'ajout de film dans la base de donnée
    //  *
    //  * @param ManagerRegistry $doctrine
    //  * @return Response
    //  */
    // #[Route('/film/ajout',name: 'film.ajout')]
    // public function ajoutFilm(Request $request, ManagerRegistry $doctrine): Response
    // {
    //     $entityManager = $doctrine->getManager();

    //     $film = new Films();
    //     $film->setTitre("Dune")
    //         ->setAnnee(2021)
    //         ->setGenre1(4)
    //         ->setGenre2(3)
    //         ->setGenre3(1)
    //         ->setActeurs([
    //             "Timothée Chalamet",
    //             "Rebecca Ferguson",
    //             "Oscar Isaac"
    //         ])
    //         ->setSynopsis("L'histoire de Paul Atreides, jeune homme aussi doué que brillant, voué à connaître un destin hors du commun qui le dépasse totalement. Car s'il veut préserver l'avenir de sa famille et de son peuple, il devra se rendre sur la planète la plus dangereuse de l'univers – la seule à même de fournir la ressource la plus précieuse au monde, capable de décupler la puissance de l'humanité. Tandis que des forces maléfiques se disputent le contrôle de cette planète, seuls ceux qui parviennent à dominer leur peur pourront survivre…")
    //         ->setImages("assets/website/images/films/4633954.jpg")
    //         ->setDuree(156);
    //         // dit a Doctrine que  tu veux (éventuellement) sauvegarder ce film (la requête n'est pas encore envoyer)
    //         $entityManager->persist($film);

    //         // Envoie, à ce moment là, la requête d'ajout dans la base de donnée (INSERT)
    //         $entityManager->flush();

    //         return new Response("Nouveau film enregistré avec comme id ".$film->getId());

    // }


}