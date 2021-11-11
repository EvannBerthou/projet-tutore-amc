<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Utils\QcmUtils;

class HomeController extends AbstractController {
    #[Route("/", name: "app_home")]
    public function generate_qcm(): Response {
        return $this->render('home.html.twig');
    }
}
