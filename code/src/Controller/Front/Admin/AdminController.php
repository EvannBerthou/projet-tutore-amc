<?php

namespace App\Controller\Front\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\UserService;

#[Route("/admin")]
class AdminController extends AbstractController {
    #[Route("/utilisateurs", name: "app_admin_front_users")]
    public function users(UserService $userService): Response {
        $users = $userService->getAllUsers();
        return $this->render("liste_utilisateur.html.twig", ['users' => $users]);
    }

    #[Route("/utilisateurs/nouveau", name: "app_admin_front_new_user")]
    public function new_user(): Response {
        return $this->render("creation_utilisateur.html.twig");
    }

    #[Route("/utilisateurs/modif", name: "app_admin_front_user")]
    public function user_profile(): Response {
        return $this->render("modif_utilisateur.html.twig ");
    }
}
