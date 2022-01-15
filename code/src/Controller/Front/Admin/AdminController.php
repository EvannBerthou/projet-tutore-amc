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

    #[Route("/utilisateurs/nouveau", name: "app_admin_front_new_uesr")]
    public function new_user(): Response {
        $response = new Response();
        return $response->setContent("Nouveau utilisateur");
    }

    #[Route("/utilisateurs/{id}", name: "app_admin_front_user")]
    public function user_profile(int $id): Response {
        $response = new Response();
        return $response->setContent("Utilisateur " . $id);
    }
}
