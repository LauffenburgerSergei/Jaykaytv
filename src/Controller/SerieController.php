<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Series;
use App\Repository\SeriesRepository;

class SerieController extends AbstractController
{
    #[Route('/serie', name: 'app_serie')]
    public function index(SeriesRepository $series): Response
    {
        return $this->render('serie/serie.html.twig', [
            'controller_name' => 'SerieController',
            'page_title'=>'Series',
            'series'=>$series->findAll(),
         
        ]);
    }

    /**
     * Affiche les détails d'une serie par son id
     * @Route("/serie/{id}", name="serie.show")
     * 
     * @param $id
     * @return Response
     */

    public function show(SeriesRepository $repository,  $id) : Response
    {
        $serie = $repository->findOneById($id);
        if(!is_numeric($id)){
            $response="l'idendifiant est incorrecte. Le format attendu est numérique";
            return $this->render('serie/none.html.twig', [
                'page_title' => 'serie inconnue',
                'id'=>$id,
                "response"=> $response,
            ]);
        }
        $serie = $repository->findOneById($id);
        if(!$serie){   
            $response="Aucunne serie ne correspond à l'identifiant {{id}}";         
            return $this->render('serie/none.html.twig',[
                 'page_title' => 'Serie inconnu',
                 'id'=>$id,
                 'response'=>$response,
            ]);
        };
        // var_dump($film); 
        //$film['titre'],
        return $this->render('serie/show.html.twig', [
            'page_title' => "",
            'serie'=>$serie,
            ]);
    }
}
