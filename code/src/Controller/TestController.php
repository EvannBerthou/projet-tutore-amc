<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 
class TestController extends AbstractController{   
    private $name = "Alicia";

    #[Route('/main', name: "app_page_utilisateur")]
    public function page_utilisateur(): Response {
        return $this->render("page_utilisateur.html.twig", ['user_name' => $this->name]);
    }
    
    #[Route("/connexion", name: "app_connexion" )]
    public function connexion(): Response {
        return $this->render("connexion.html.twig");
    }  


}
