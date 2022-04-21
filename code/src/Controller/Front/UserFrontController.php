<?php

namespace App\Controller\Front;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserFrontController extends AbstractController {
    #[Route('/connexion', name: 'app_front_connexion')]
    public function login(): Response {
        return $this->render('connexion.html.twig');
    }

    #[Route('/accueil-utilisateur', name: 'app_home_front_user')]
    public function user(): Response {
        $response = new Response();
        return $this->render('accueil_utilisateur.html.twig');
    }

    #[Route('/deconnexion', name: 'app_front_deconnexion')]
    public function logout(): Response {
        return $this->redirectToRoute('app_logout');
    }
}
