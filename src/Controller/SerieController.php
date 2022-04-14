<?php

namespace App\Controller;

use App\Repository\SeriesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
}
