<?php

namespace App\Controller\Front;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\QCM;
use Psr\Log\LoggerInterface;
use App\Utils\ControllerUtils;

#[Route('/qcm')]
class QcmFrontController extends AbstractController {
    private function forwardTo(string $routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $this->forward($routes->get($routename)->getDefaults()['_controller']);
    }

    #[Route('/mes_qcm', name: 'app_qcm_front_list')]
    public function list_qcm(ManagerRegistry $doctrine, LoggerInterface $logger): Response {
        $response = $this->forwardTo('app_list_qcm');
        $json = json_decode($response->getContent());
        return $this->render('page_utilisateur.html.twig', [
            'user_name' => 'Alicia',
            'qcm_list' => $json,
        ]);
    }

    #[Route('/modif_qcm', name: 'app_qcm_front_update')]
    public function update_qcm(): Response {
        $response = new Response();
        return $this->render('modif_qcm.html.twig');
    }

    #[Route('/correction_qcm', name: 'app_qcm_front_mark')]
    public function mark_qcm(): Response {
        $response = new Response();
        return $response->setContent('Correction QCM');
    }
}
