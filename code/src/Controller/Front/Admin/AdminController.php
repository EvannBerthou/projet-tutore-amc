<?php

namespace App\Controller\Front\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/admin")]
class AdminController extends AbstractController {
    #[Route("/utilisateurs", name: "app_admin_front_users")]
    public function users(): Response {
        $response = new Response();
        return $response->setContent("Utilisateurs");
    }

    #[Route("/accueil-utilisateur", name: "app_home_front_user")]
    public function user(): Response {
        $response = new Response();
        return $this->render("accueil_utilisateur.html.twig");
    }

    #[Route("/utilisateurs/nouveau", name: "app_admin_front_new_user")]
    public function new_user(): Response {
        $response = new Response();
        return $response->setContent("Nouveau utilisateur");
    }

    #[Route("/utilisateurs", name: "app_admin_front_user")]
    public function user_profile(): Response {
        $response = new Response();
        return $response->setContent("Profil Utilisateur ");
    }
}
