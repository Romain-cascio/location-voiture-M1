<?php

// src/Controller/AccueilController.php
namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\SearchVehiculeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SearchVehiculeType::class);
        $form->handleRequest($request);

        if ($form->get('dateDebut')->getData() && $form->get('dateFin')->getData()) {
            // Dates remplies, redirection vers la page de résultats
            return $this->redirectToRoute('app_resultat');
        }

        return $this->render('accueil/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}



