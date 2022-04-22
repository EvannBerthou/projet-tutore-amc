<?php

namespace App\Controller\Front;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpKernel\KernelInterface;

class HomeController extends AbstractController {
    #[Route('/accueil', name: 'app_home')]
    public function home(): Response {
        return $this->render('home.html.twig');
    }

    #[Route('/env', name: 'app_env')]
    public function env(KernelInterface $kernel): Response {
        return new Response($kernel->getEnvironment());
    }
}
