<?php

namespace App\Controller;

use App\Entity\Films;
use App\Entity\Genres;
use App\Form\FilmType;
use App\Repository\FilmsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
        /**
     * Permet l'ajout de film dans la base de donnée
     *
     * @param ManagerRegistry $doctrine
     * @return Response
     */
    #[Route('/film/ajout',name: 'film.ajout')]
    public function ajoutFilm(): Response
    {
        // fabricant de formulaire de symfony : FORMBUILDER
        $film = new Films();
        //appelle la creation du formulaire d'ajout 
        $form = $this->createForm(FilmType::class,$film);
        //on lance la fabrication et la configuration de notre fomrulaire
        // $form = $this->createFormBuilder($film)
        //               ->add('titre',TextType::class, ['label'=>"Titre du film",'attr'=>[
        //                 "class"=>"form__input"
        //             ]])
        //               ->add('annee',IntType::class, [
        //                   'label'=>"Année de création du film",
        //                   'attr'=>[
        //                     "class"=>"form__input"
        //             ]])
        //               ->add('genre_1',TextType::class, ['label'=>"Genre principal",'attr'=>[
        //                 "class"=>"form__input"
        //             ]])
        //               ->add('genre_2',TextType::class, ['label'=>"Genre secondaire",'attr'=>[
        //                 "class"=>"form__input"
        //             ]])
        //               ->add('genre_3',TextType::class, ['label'=>"Genre tertiaire",'attr'=>[
        //                 "class"=>"form__input"
        //             ]])
        //               ->add('acteurs',)
        //               ->add('synopsis')
        //               ->add('images')
        //               ->add('duree');

        
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
        
        // if(!is_numeric($id)){
        //     $response = "L'identifiant est incorrect. Le format attendu est numérique.";
        //                 return $this->render('film/none.html.twig',[
        //          'page_title' => 'Film inconnu',
        //          'id'=>$id,
        //          'response'=>$response,
        //     ]);
        // }
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





}