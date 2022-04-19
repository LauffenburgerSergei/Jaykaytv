<?php

namespace App\Controller;

use App\Entity\Series;
use App\Form\SeriesType;
use App\Repository\SeriesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class SerieController extends AbstractController
{
    #[Route('/serie', name: 'app_serie')]
    public function index(SeriesRepository $series): Response
    {
        return $this->render('serie/serie.html.twig', [
            'controller_name' => 'SerieController',
            'page_title' => 'Series',
            'series' => $series->findAll(),

        ]);
    }

    /**
     * Permet l'ajout de serie dans la base de donnée
     *
     * @param ManagerRegistry $doctrine
     * @return Response
     */
    #[Route('/serie/ajout', name: 'serie.ajout')]
    public function ajoutFilm(Request $request, ManagerRegistry $doctrine): Response
    {
        $manager = $doctrine->getManager();
        $serie = new Series();
        //appelle la creation du formulaire d'ajout 
        $form = $this->createForm(SeriesType::class, $serie);
        // Récupération des données du formulaires
        $form->handleRequest($request);

        // Sécurité et validation
        if ($form->isSubmitted() && $form->isValid()) {
            //si le formulaire est soumis ET valide on demande a doctrine de sauvegarder ces données dans la bdd
            /** @var UploadedFile $imageFilm */
            $imageFile = $form->get('images')->getData();
            if ($imageFile) {
                $newFilename = str_replace(' ', '_', $serie->getTitre()) . '-' . uniqid() . '.' . $imageFile->guessExtension();

                // Déplace le fichier dans le dossier ou les images sont stocké
                // images_directory est defini dans /config/services.yaml
                try {
                    $imageFile->move(
                        $this->getParameter('s_images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                    // nan mais il y aura pas d'erreur, le code est parfait ...
                }

                // updates the 'imageFilename' property to store the file name
                // instead of its contents
                $path = "build/website/images/series";
                $serie->setImages($path . '/' . $newFilename);
            }
            $manager->persist($serie);
            $manager->flush();
            $this->addFlash('success', "Votre serie, <strong>{$serie->getTitre()}</strong>, a bien été soumise");

            return $this->redirectToRoute('app_serie', [
                'page_title' => 'Series',
            ]);
        }

        return $this->render('serie/ajout.html.twig', [
            'page_title' => "Ajouter un serie",
            'form' => $form->createView(),
        ]);
    }

    /**
     * Affiche les détails d'une serie par son id
     * @Route("/serie/{id}", name="serie.show")
     * 
     * @param $id
     * @return Response
     */
    public function show(SeriesRepository $repository,  $id): Response
    {
        if (!is_numeric($id)) {
            $response = "L'idendifiant est incorrecte. Le format attendu est numérique";
            return $this->render('film/none.html.twig', [
                'page_title' => 'serie inconnue',
                'id' => $id,
                "response" => $response,
            ]);
        }
        $serie = $repository->findOneById($id);
        if (!$serie) {
            $response = "Aucunne serie ne correspond à l'identifiant {{id}}";
            return $this->render('film/none.html.twig', [
                'page_title' => 'Serie inconnu',
                'id' => $id,
                'response' => $response,
            ]);
        };
        return $this->render('serie/show.html.twig', [
            'page_title' => "",
            'serie' => $serie,
        ]);
    }
}
