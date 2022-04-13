<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    #[Route('/serie', name: 'app_serie')]
    public function index(): Response
    {
        return $this->render('serie/serie.html.twig', [
            'controller_name' => 'SerieController',
            'page_title'=>'Series',
         
        ]);
    }
}
