<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\SearchVehiculeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultatController extends AbstractController
{
    #[Route('/resultat', name: 'app_resultat')] // Notez le changement de nom de route pour correspondre à votre utilisation
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $resultats = $entityManager->getRepository(Vehicule::class)->findAll();

        return $this->render('resultat/index.html.twig', [ // Notez le changement du nom du dossier du template
            'resultats' => $resultats,
        ]);
    }
}