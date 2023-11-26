<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegistrationFormType;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_registration')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupère les données soumises au formulaire
            $user = $form->getData();
    
            // Pas d'encodage du mot de passe pour le moment
            // En production, utilisez le service UserPasswordEncoderInterface pour l'encodage
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
    
            return $this->redirectToRoute('votre_route_de_redirection_apres_l_inscription');
        }
    
        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
