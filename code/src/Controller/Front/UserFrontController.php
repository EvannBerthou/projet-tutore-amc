<?php

namespace App\Controller\Front;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserFrontController extends AbstractController {
    #[Route('/connexion', name: 'app_front_connexion')]
    public function login(AuthenticationUtils $authenticationUtils): Response {
        //TODO: Mettre le message d'erreur en français 
        // https://stackoverflow.com/questions/61647960/how-to-change-the-authentication-error-message
        return $this->render('connexion.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/accueil-utilisateur', name: 'app_home_front_user')]
    public function user(): Response {
        $session = $this->getUser();
        if (!$session) {
            return $this->redirectToRoute("app_front_connexion");
        }

        return $this->render("accueil_utilisateur.html.twig", [
            'session' => $session
        ]);
    }

    #[Route('/deconnexion', name: 'app_front_deconnexion')]
    public function logout(): Response {
        return $this->redirectToRoute('app_logout');
    }
}
