<?php

namespace App\Controller;

use App\Entity\Films;
use App\Form\FilmType;
use App\Repository\FilmsRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FilmController extends AbstractController
{
    #[Route('/film', name: 'app_film')]
    public function index(FilmsRepository $films): Response
    {        
        //Récupère l'object en fonction de l'id 
        return $this->render('film/film.html.twig', [
            'controller_name' => 'FilmController',
            'page_title' => 'Films',
            'films'=>$films->findAll()
        ]);
    }
    /**
     * Permet l'ajout de film dans la base de donnée
     *
     * @param ManagerRegistry $doctrine
     * @return Response
     */
    #[Route('/film/ajout',name: 'film.ajout')]
    public function ajoutFilm(Request $request, ManagerRegistry $doctrine): Response
    {
        $manager= $doctrine->getManager();
        $film = new Films();
        //appelle la creation du formulaire d'ajout 
        $form = $this->createForm(FilmType::class,$film);
        // Récuperation des données du fomulaires
        $form->handleRequest($request);
        
         // Securité et validation
        if($form->isSubmitted() && $form->isValid()){
            //si le formulaire est soumis ET valide on demande a doctrine de sauvegarder ces données dans la bdd
            /** @var UploadedFile $imageFilm */
            $imageFile = $form->get('images')->getData();
            if($imageFile){
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                
                $newFilename = str_replace(' ','_',$film->getTitre()).'-'.uniqid().'.'.$imageFile->guessExtension();
                
                // Déplace le fichier dans le dossier ou les images sont stocké
                // images_directory est defini dans /config/services.yaml
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $path = "build/website/images/films";
                $film->setImages($path.'/'.$newFilename);
            }
            $manager ->persist($film);
            $manager->flush();
            $this->addFlash('success',"Votre film, <strong>{$film->getTitre()}</strong>, a bien été soumis");

            return $this->redirectToRoute('app_film',[
                'page_title'=>'Films',
            ]);
        }
        
        return $this->render('film/ajout.html.twig',[
            'page_title'=>"Ajouter un film",
            'form'=>$form->createView(),
        ]);
    }

//  
    /**
     * Affiche les détails d'un film
     *@Route("/film/{id}", name="film.show")
     * 
     * @return Response
     */
    //  #[Route('/film/{$id}', name: 'film.show')]
    public function show(FilmsRepository $repository, $id): Response
    {
        $genres = [
            'Action','Comédie','Drame','Science Fiction', 'Horreur','Romance','Animation','Thriller','Biopic','Guerre','Aventure','Crime','Fantastique','Fantaisie','Historique','Policier', 'Comédie Romantique','Médical'
        ];
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
        return $this->render('film/show.html.twig', [
            'page_title' => "",
            'film'=>$film,
            'genres'=>$genres,
            ]);
    }





}