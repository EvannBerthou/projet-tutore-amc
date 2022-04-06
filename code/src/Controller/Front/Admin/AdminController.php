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
        return $this->render("liste_utilisateur.html.twig");
    }

    #[Route("/utilisateurs/nouveau", name: "app_admin_front_new_user")]
    public function new_user(): Response {
        $response = new Response();
        return $this->render("creation_utilisateur.html.twig");
    }

    #[Route("/utilisateurs/modif", name: "app_admin_front_user")]
    public function user_profile(): Response {
        $response = new Response();
        return $this->render("modif_utilisateur.html.twig ");
    }
}
