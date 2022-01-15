<?php

namespace App\Controller\Front;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserFrontController extends AbstractController {
    #[Route("/connexion", name: "app_front_connexion")]
    public function login(): Response {
        return "Front-end: connexion";
    }

    #[Route("/deconnexion", name: "app_front_deconnexion")]
    public function logout(): Response {
        return "Front-end: deconnexion";
    }
}
